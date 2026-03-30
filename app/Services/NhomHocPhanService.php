<?php

namespace App\Services;

use App\Exceptions\BusinessException;
use App\Exceptions\NotFoundException;
use App\Models\ChiTietNhom;
use App\Models\NhomHocPhan;
use App\Models\User;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;

class NhomHocPhanService
{
    public function getAll()
    {
        return NhomHocPhan::all();
    }

    public function getOne(NhomHocPhan $nhomHocPhan)
    {
        return $nhomHocPhan;
    }

    public function add(array $data)
    {
        return NhomHocPhan::create($data);
    }

    public function update(array $data, NhomHocPhan $nhomHocPhan)
    {
        $nhomHocPhan->update($data);
        return $nhomHocPhan;
    }

    public function delete(NhomHocPhan $nhomHocPhan)
    {
        $nhomHocPhan->update(['isDeleted' => true]);
        return true;
    }

    public function hidden(NhomHocPhan $nhomHocPhan)
    {
        $nhomHocPhan->update(['isHide' => true]);
        return $nhomHocPhan;
    }

    public function get_w_gvien_mon(NhomHocPhan $nhomHocPhan)
    {
        $nhomHocPhan->load(['giangVien', 'monHoc']);
        return $nhomHocPhan;
    }

    public function get_w_dekiemtra(NhomHocPhan $nhomHocPhan)
    {
        $nhomHocPhan->load(['deThis']);
        return $nhomHocPhan;
    }

    public function join_group(array $data)
    {
        $mamoi = $data["maMoi"];
        $sinhVienId = $data["sinhVienId"];
        $nhomHocPhanId = $data["nhomHocPhanId"];

        $nhomHocPhan = NhomHocPhan::findOrFail($nhomHocPhanId);

        if ($mamoi !== $nhomHocPhan->maMoi) {
            throw new BusinessException('Mã tham gia không đúng');
        }

        $chiTietNhom = [
            "sinhVienId" => $sinhVienId,
            "nhomHocPhanId" => $nhomHocPhanId
        ];

        return ChiTietNhom::create($chiTietNhom);
    }

    public function get_o_svien(User $user)
    {
        $user->load([
            'nhomHocPhans.giangVien',
            'nhomHocPhans.monHoc'
        ]);
        return $user;
    }

    public function get_danh_sach_sinh_vien(NhomHocPhan $nhomHocPhan, ?string $keyword = null): array
    {
        $query = $nhomHocPhan->sinhViens()
            ->where('users.isStudent', true)
            ->where('users.isDeleted', false)
            ->orderBy('users.hoTen');

        if (!empty($keyword)) {
            $keyword = trim($keyword);
            $query->where(function ($q) use ($keyword) {
                $q->where('users.hoTen', 'like', "%{$keyword}%")
                  ->orWhere('users.ma', 'like', "%{$keyword}%")
                  ->orWhere('users.email', 'like', "%{$keyword}%");
            });
        }

        $sinhViens = $query->get()->makeHidden('pivot');

        if (empty($keyword) && $sinhViens->isEmpty()) {
            throw new NotFoundException('Nhóm học phần chưa có sinh viên, vui lòng thêm sinh viên mới.');
        }

        return [
            'nhomHocPhanId' => $nhomHocPhan->id,
            'soLuongSinhVien' => $sinhViens->count(),
            'keyword' => $keyword,
            'sinhViens' => $sinhViens,
        ];
    }

    public function getSinhViensExport(NhomHocPhan $nhomHocPhan, ?string $keyword = null): array
    {
        $danhSach = $this->get_danh_sach_sinh_vien($nhomHocPhan, $keyword);
        $sinhViens = collect($danhSach['sinhViens']);

        $rows = $sinhViens->values()->map(function ($sinhVien, $index) {
            $ngaySinh = $sinhVien->ngaySinh ? $sinhVien->ngaySinh->format('d-m-Y') : '';

            return [
                $index + 1,
                $sinhVien->ma,
                $sinhVien->hoTen,
                $sinhVien->email,
                $sinhVien->sdt,
                $ngaySinh,
            ];
        })->toArray();

        return [
            'fileNameAttributes' => [
                'namHoc' => $nhomHocPhan->namHoc,
                'hocKy' => $nhomHocPhan->hocKy,
                'tenNhomHocPhan' => $nhomHocPhan->tenNhom,
                'idNhomHocPhan' => $nhomHocPhan->id,
            ],
            'headerTitles' => [
                'STT',
                'MSSV',
                'Tên sinh viên',
                'Email',
                'SĐT',
                'Ngày sinh',
            ],
            'data' => $rows,
        ];
    }

    public function importSinhViensToNhom(NhomHocPhan $nhomHocPhan, array $rows): array
    {
        $missing = [];
        $added = [];

        foreach ($rows as $rowIndex => $row) {
            $mssv = isset($row[1]) ? trim((string)$row[1]) : null;
            if (empty($mssv)) {
                continue;
            }

            $user = User::query()->where('ma', $mssv)->first();
            if (!$user) {
                $missing[] = [
                    'dòng' => $rowIndex + 2,
                    'mssv' => $mssv,
                    'hoTen' => isset($row[2]) ? trim((string)$row[2]) : null,
                    'email' => isset($row[3]) ? trim((string)$row[3]) : null,
                    'sdt' => isset($row[4]) ? trim((string)$row[4]) : null,
                    'ngaySinh' => $this->normalizeImportedBirthDate($row[5] ?? null),
                ];
                continue;
            }

            try {
                $this->add_sinh_vien_to_nhom($user->id, $nhomHocPhan);
                $added[] = ['id' => $user->id, 'ma' => $user->ma, 'hoTen' => $user->hoTen];
            } catch (BusinessException $e) {
                if (str_contains($e->getMessage(), 'đã có trong nhóm')) {
                    continue;
                }
                throw $e;
            }
        }

        if (!empty($missing)) {
            throw new NotFoundException(
                'Một số sinh viên không tồn tại trong hệ thống',
                $missing,
            );
        }

        return [
            'added' => $added,
            'count' => count($added),
        ];
    }

    public function add_sinh_vien_to_nhom(int $sinhVienId, NhomHocPhan $nhomHocPhan)
    {
        $user = User::findOrFail($sinhVienId);

        if (!$user->isStudent) {
            throw new BusinessException('Người dùng không phải là sinh viên');
        }

        if ($user->isDeleted) {
            throw new BusinessException('Người dùng đã bị xóa');
        }

        $exists = ChiTietNhom::where('sinhVienId', $sinhVienId)
            ->where('nhomHocPhanId', $nhomHocPhan->id)
            ->exists();

        if ($exists) {
            throw new BusinessException('Sinh viên đã có trong nhóm học phần này');
        }

        return ChiTietNhom::create([
            'sinhVienId' => $sinhVienId,
            'nhomHocPhanId' => $nhomHocPhan->id,
        ]);
    }

    public function resetInviteCode(NhomHocPhan $nhomHocPhan)
    {
        $nhomHocPhan->update(['maMoi' => Str::random(19)]);
        return $nhomHocPhan;
    }

    public function getAssignedTeachingByLecturerId(int $lecturerId, bool $includeHidden = false): array
    {
        $query = NhomHocPhan::query()
            ->with(['monHoc', 'deThis'])
            ->where('giangVienId', $lecturerId)
            ->where('isDeleted', false)
            ->orderByDesc('id');

        if (!$includeHidden) {
            $query->where('isHide', false);
        }

        $nhomHocPhans = $query->get();

        $monHocs = $nhomHocPhans
            ->pluck('monHoc')
            ->filter()
            ->unique('id')
            ->values();

        return [
            'nhomHocPhans' => $nhomHocPhans,
            'monHocs' => $monHocs,
            'summary' => [
                'soNhomHocPhan' => $nhomHocPhans->count(),
                'soMonHoc' => $monHocs->count(),
            ],
        ];
    }

    public function remove_sinh_vien_from_nhom(int $sinhVienId, NhomHocPhan $nhomHocPhan): bool
    {
        $deleted = ChiTietNhom::where('sinhVienId', $sinhVienId)
            ->where('nhomHocPhanId', $nhomHocPhan->id)
            ->delete();

        if ($deleted === 0) {
            throw new NotFoundException('Sinh viên không tồn tại trong nhóm học phần này');
        }

        return true;
    }

    private function normalizeImportedBirthDate($value): ?string
    {
        if ($value === null) {
            return null;
        }

        if (is_string($value)) {
            $value = trim($value);
            if ($value === '') {
                return null;
            }
        }

        if (is_numeric($value)) {
            try {
                return ExcelDate::excelToDateTimeObject((float) $value)->format('d-m-Y');
            } catch (\Throwable $e) {
                return (string) $value;
            }
        }

        $raw = (string) $value;
        $parsed = \DateTime::createFromFormat('d-m-Y', $raw);
        if ($parsed !== false) {
            return $parsed->format('d-m-Y');
        }

        $timestamp = strtotime($raw);
        if ($timestamp !== false) {
            return date('d-m-Y', $timestamp);
        }

        return $raw;
    }
}
