<?php

namespace App\Services;

use App\Exceptions\BusinessException;
use App\Models\BaiLam;
use App\Models\CauHinhThi;
use App\Models\CauHoi;
use App\Models\ChiTietDeThi;
use App\Models\DeThi;
use App\Models\DoKho;
use App\Models\GiaoBaiThi;
use App\Models\MonHoc;
use App\Models\NhomHocPhan;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class DeThiService
{
    protected GiaoBaiThiService $giaoBaiThiService;
    protected ChiTietDeThiService $chiTietDeThiService;
    protected CauHinhThiService $cauHinhThiService;

    public function __construct(GiaoBaiThiService $giaoBaiThiService, ChiTietDeThiService $chiTietDeThiService, CauHinhThiService $cauHinhThiService)
    {
        $this->giaoBaiThiService = $giaoBaiThiService;
        $this->chiTietDeThiService = $chiTietDeThiService;
        $this->cauHinhThiService = $cauHinhThiService;
    }
    public function getAll()
    {
        return DeThi::all()->load(['monThi', 'nhomHocPhans']);
    }

    public function getOne(DeThi $deThi)
    {
        $deThi->load('cauHois');
        $deThi->cauHois->load('cauTraLois');
        return $deThi;
    }

    public function getById(int $id)
    {
        return DeThi::findOrFail($id);
    }

    public function add(array $data)
    {
        return DB::transaction(function () use ($data) {
            $deThiData = [
                "tenDe" => $data["tenDe"],
                "thoiGianBatDau" => $data["thoiGianBatDau"],
                "thoiGianKetThuc" => $data["thoiGianKetThuc"],
                "thoiGianLamBai" => $data["thoiGianLamBai"],
                "nguoiTaoId" => $data["nguoiTaoId"],
                "monThiId" => $data["monThiId"],
            ];

            $deThi = DeThi::create($deThiData);

            $nhomHocPhanIds = $data["nhomHocPhanIds"];
            $cauHois = $data["cauHois"];

            $giaoBaiThis = collect($nhomHocPhanIds)->map(function ($item) use ($deThi) {
                return (
                    [
                        "deThiId" => $deThi->id,
                        "nhomHocPhanId" => $item,
                        "thoiGianBatDau" => $deThi["thoiGianBatDau"],
                        "thoiGianKetThuc" => $deThi["thoiGianKetThuc"],
                    ]
                );
            });

            $chiTietDeThis = collect($cauHois)->map(function ($item) use ($deThi) {
                return ([
                    "deThiId" => $deThi->id,
                    "cauHoiId" => $item["id"],
                    "thuTu" => $item["thuTu"],
                    "diem" => $item["diem"]
                ]);
            });

            $this->giaoBaiThiService->addArr($giaoBaiThis->toArray());
            $this->chiTietDeThiService->addArr($chiTietDeThis->toArray());

            $cauHinh = $data["cauHinh"];
            $cauHinh["deThiId"] = $deThi->id;

            $this->cauHinhThiService->create($cauHinh);

            $deThi->load(['cauHois', 'monThi', 'nhomHocPhans', 'cauHinhThi']);
            $deThi->cauHois->load('cauTraLois');

            return $deThi;
        });
    }

    public function generateByFilter(array $data)
    {
        return DB::transaction(function () use ($data) {
            $nhomHocPhanIds = array_values(array_unique($data['nhomHocPhanIds'] ?? []));

            $creator = User::query()
                ->with(['role', 'monHocs'])
                ->findOrFail($data['nguoiTaoId']);

            $roleName = strtolower((string) optional($creator->role)->tenNhomQuyen);
            $isAdmin = $roleName === 'admin';
            $isTeacher = $roleName === 'teacher';

            if (!$isAdmin && !$isTeacher) {
                throw new BusinessException('Chỉ admin hoặc giảng viên mới được tạo đề ngẫu nhiên', 403);
            }

            $allowedMonHocIds = $this->getAllowedMonHocIds($creator, $isAdmin);
            if (!in_array((int) $data['monThiId'], $allowedMonHocIds, true)) {
                throw new BusinessException('Bạn không có quyền tạo đề cho môn học này', 403);
            }

            if (!empty($nhomHocPhanIds)) {
                $this->validateNhomHocPhans($nhomHocPhanIds, (int) $data['monThiId'], $creator->id, $isAdmin);
            }

            $chuongIds = array_values(array_unique($data['chuongIds'] ?? []));
            if (!empty($chuongIds)) {
                $validChapterCount = DB::table('chuongs')
                    ->whereIn('id', $chuongIds)
                    ->where('monHocId', $data['monThiId'])
                    ->where('isDeleted', false)
                    ->count();

                if ($validChapterCount !== count($chuongIds)) {
                    throw new BusinessException('Danh sách chương không hợp lệ cho môn đã chọn', 422);
                }
            }

            $doKhoFilters = collect($data['doKhoFilters'])
                ->groupBy('doKhoId')
                ->map(function ($items) {
                    return (int) collect($items)->sum('soLuongCau');
                })
                ->filter(function ($soLuong) {
                    return $soLuong > 0;
                });

            if ($doKhoFilters->isEmpty()) {
                throw new BusinessException('Cấu hình độ khó không hợp lệ, mỗi mức cần số lượng câu lớn hơn 0', 422);
            }

            $selectedQuestions = collect();

            foreach ($doKhoFilters as $doKhoId => $soLuongCau) {
                $query = CauHoi::query()
                    ->where('isDeleted', false)
                    ->where('status', '!=', 'archive')
                    ->where('monHocId', $data['monThiId'])
                    ->where('doKhoId', (int) $doKhoId);

                if (!empty($chuongIds)) {
                    $query->whereIn('chuongId', $chuongIds);
                }

                if (!$isAdmin) {
                    $query->where(function (Builder $inner) use ($creator) {
                        $inner->where('status', 'public')
                            ->orWhere('nguoiTaoId', $creator->id);
                    });
                }

                $questionsByDifficulty = $query
                    ->inRandomOrder()
                    ->limit($soLuongCau)
                    ->get();

                if ($questionsByDifficulty->count() < $soLuongCau) {
                    $doKho = DoKho::query()->find($doKhoId);
                    $tenDoKho = $doKho?->tenDoKho ?? ('ID ' . $doKhoId);
                    throw new BusinessException('Không đủ câu hỏi cho độ khó ' . $tenDoKho, 422);
                }

                $selectedQuestions = $selectedQuestions->concat($questionsByDifficulty);
            }

            $selectedQuestions = $selectedQuestions
                ->shuffle()
                ->values();

            if ($selectedQuestions->isEmpty()) {
                throw new BusinessException('Không có câu hỏi phù hợp với bộ lọc đã chọn', 422);
            }

            $deThi = DeThi::create([
                'tenDe' => $data['tenDe'],
                'thoiGianBatDau' => $data['thoiGianBatDau'],
                'thoiGianKetThuc' => $data['thoiGianKetThuc'],
                'thoiGianLamBai' => $data['thoiGianLamBai'],
                'nguoiTaoId' => $data['nguoiTaoId'],
                'monThiId' => $data['monThiId'],
            ]);

            $giaoBaiThis = collect($nhomHocPhanIds)->map(function ($nhomHocPhanId) use ($deThi) {
                return [
                    'deThiId' => $deThi->id,
                    'nhomHocPhanId' => $nhomHocPhanId,
                    'thoiGianBatDau' => $deThi->thoiGianBatDau,
                    'thoiGianKetThuc' => $deThi->thoiGianKetThuc,
                ];
            });

            $chiTietDeThis = $selectedQuestions->values()->map(function ($question, $index) use ($deThi) {
                return [
                    'deThiId' => $deThi->id,
                    'cauHoiId' => $question->id,
                    'thuTu' => $index + 1,
                    'diem' => $question->diemMacDinh ?? 1,
                ];
            });

            if ($giaoBaiThis->isNotEmpty()) {
                $this->giaoBaiThiService->addArr($giaoBaiThis->toArray());
            }
            $this->chiTietDeThiService->addArr($chiTietDeThis->toArray());

            $cauHinh = $data['cauHinh'];
            $cauHinh['deThiId'] = $deThi->id;
            $this->cauHinhThiService->create($cauHinh);

            $deThi->load(['cauHois', 'monThi', 'nhomHocPhans', 'cauHinhThi']);
            $deThi->cauHois->load('cauTraLois');

            return $deThi;
        });
    }

    public function update(array $data, DeThi $deThi)
    {
        return DB::transaction(function () use ($data, $deThi) {
            // 1. Update DeThi

            $deThi->update($data);

            /*
        =========================
        2. Xử lý nhóm học phần
        =========================
        */
            if (isset($data['nhomHocPhanIds'])) {
                // Xóa cũ
                $this->giaoBaiThiService->deleteByDeThiId($deThi->id);

                // Tạo mới
                $giaoBaiThis = collect($data['nhomHocPhanIds'])->map(function ($item) use ($deThi) {
                    return [
                        "deThiId" => $deThi->id,
                        "nhomHocPhanId" => $item,
                        "thoiGianBatDau" => $deThi->thoiGianBatDau,
                        "thoiGianKetThuc" => $deThi->thoiGianKetThuc,
                    ];
                });

                $this->giaoBaiThiService->addArr($giaoBaiThis->toArray());
            }

            /*
        =========================
        3. Xử lý câu hỏi
        =========================
        */
            if (isset($data['cauHois'])) {
                // Xóa cũ
                $this->chiTietDeThiService->deleteByDeThiId($deThi->id);

                // Tạo mới
                $chiTietDeThis = collect($data['cauHois'])->map(function ($item) use ($deThi) {
                    return [
                        "deThiId" => $deThi->id,
                        "cauHoiId" => $item["id"],
                        "thuTu" => $item["thuTu"],
                        "diem" => $item["diem"]
                    ];
                });

                $this->chiTietDeThiService->addArr($chiTietDeThis->toArray());
            }

            /*
        =========================
        4. Xử lý cấu hình
        =========================
        */
            if (isset($data['cauHinh'])) {
                $cauHinhData = $data['cauHinh'];
                $cauHinhData['deThiId'] = $deThi->id;

                // Nếu đã có thì update, chưa có thì create
                $cauHinh = $this->cauHinhThiService->findByDeThiId($deThi->id);

                if ($cauHinh) {
                    $this->cauHinhThiService->update($cauHinh, $cauHinhData);
                } else {
                    $this->cauHinhThiService->create($cauHinhData);
                }
            }

            /*
        =========================
        5. Load lại dữ liệu
        =========================
        */
            $deThi->load(['cauHois', 'monThi', 'nhomHocPhans', 'cauHinhThi']);
            $deThi->cauHois->load('cauTraLois');

            return $deThi;
        });
    }

    public function delete(int $deThiId)
    {
        return DB::transaction(function () use ($deThiId) {

            $deThi = DeThi::findOrFail($deThiId);

            $hasBaiLam = BaiLam::where('deThiId', $deThiId)->exists();

            //xóa mềm
            if ($hasBaiLam) {
                $deThi->update([
                    'isDeleted' => true
                ]);

                return true;
            }

            //xóa cứng
            // 1. Xóa cấu hình
            CauHinhThi::where('deThiId', $deThiId)->delete();

            // 2. Xóa chi tiết đề thi (câu hỏi)
            ChiTietDeThi::where('deThiId', $deThiId)->delete();

            // 3. Xóa giao bài thi
            GiaoBaiThi::where('deThiId', $deThiId)->delete();

            // 4. Xóa đề thi
            $deThi->delete();

            return true;
        });
    }

    public function get_osvien(User $user)
    { // lấy tất cả đề thi của sinh viên
        $user->load('nhomHocPhans.deThis');

        //map và tách các phần tử trong mảng con (dethis) ra 1 mảng
        $deThi = $user->nhomHocPhans->flatMap(
            function ($nhomHocPhan) {
                return $nhomHocPhan->deThis->load('monThi');
            }
        )->unique('id')->values(); // tránh trường hợp đề thi chia cho 2 nhóm khác nhau
        $deThi;

        return $deThi;
    }

    public function getQuestions(int $deThiId)
    {
        $deThi = DeThi::findOrFail($deThiId);
        $deThi->load('cauHois');
        return $deThi->cauHois;
    }

    public function getAd(DeThi $deThi)
    {
        $deThi->load(['cauHois', 'monThi', 'nhomHocPhans', 'cauHinhThi']);
        $deThi->cauHois->load('cauTraLois');
        return $deThi;
    }

    private function getAllowedMonHocIds(User $creator, bool $isAdmin): array
    {
        if ($isAdmin) {
            return MonHoc::query()
                ->where('isDeleted', false)
                ->pluck('id')
                ->map(function ($id) {
                    return (int) $id;
                })
                ->all();
        }

        return $creator->monHocs
            ->pluck('id')
            ->map(function ($id) {
                return (int) $id;
            })
            ->all();
    }

    private function validateNhomHocPhans(array $nhomHocPhanIds, int $monThiId, int $nguoiTaoId, bool $isAdmin): void
    {
        $query = NhomHocPhan::query()
            ->whereIn('id', $nhomHocPhanIds)
            ->where('monHocId', $monThiId)
            ->where('isDeleted', false);

        if (!$isAdmin) {
            $query->where('giangVienId', $nguoiTaoId);
        }

        $validCount = $query->count();
        if ($validCount !== count(array_unique($nhomHocPhanIds))) {
            throw new BusinessException('Danh sách nhóm học phần không hợp lệ hoặc không thuộc quyền quản lý', 422);
        }
    }


    //bài làm theo nhóm học phần, theo user 
    public function get_by_nhomhocphan_svien(NhomHocPhan $nhomHocPhan, User $user)
    {
        $nhomHocPhan->load([
            'deThis.baiLams' => function ($query) use ($user) {
                $query->where('thiSinhId', $user->id)
                    ->orderByDesc('created_at');
            }
        ]);

        $nhomHocPhan->deThis->each(function ($deThi) {
            // lấy bài làm gần nhất
            $deThi->bai_lam = $deThi->baiLams->first() ?? null;

            $deThi->makeHidden("baiLams");
        });

        return $nhomHocPhan;
    }
}
