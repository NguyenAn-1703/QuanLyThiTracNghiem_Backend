<?php

namespace App\Services;

use App\Exceptions\BusinessException;
use App\Models\CauHoi;
use App\Models\Chuong;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CauHoiService
{
    public function getAll(array $filters = [])
    {
        $query = CauHoi::query()
            ->with(['monHoc', 'chuong', 'doKho', 'nguoiTao', 'cauTraLois'])
            ->withCount('deThis')
            ->where('isDeleted', false);

        $this->applyFilters($query, $filters);

        return $query
            ->orderByDesc('created_at')
            ->get();
    }

    public function getOne(CauHoi $cauHoi)
    {
        return $cauHoi
            ->load(['cauTraLois', 'monHoc', 'chuong', 'doKho', 'nguoiTao'])
            ->loadCount('deThis');
    }

    public function add(array $data)
    {
        return DB::transaction(function () use ($data) {
            $answers = Arr::pull($data, 'cauTraLois', []);

            $this->validateReferenceConsistency($data);

            $cauHoi = CauHoi::create($data);

            $cauHoi->cauTraLois()->createMany($answers);

            return $this->getOne($cauHoi);
        });
    }

    public function update(array $data, CauHoi $cauHoi)
    {
        return DB::transaction(function () use ($data, $cauHoi) {
            $answers = Arr::pull($data, 'cauTraLois', null);

            $mergedData = array_merge($cauHoi->only(['monHocId', 'chuongId']), $data);
            $this->validateReferenceConsistency($mergedData);

            if (!empty($data)) {
                $cauHoi->update($data);
            }

            if (is_array($answers)) {
                $this->syncAnswers($cauHoi, $answers);
            }

            return $this->getOne($cauHoi->refresh());
        });
    }

    public function delete(CauHoi $cauHoi)
    {
        $cauHoi->update(['isDeleted' => true]);
        return true;
    }

    public function changeStatus(CauHoi $cauHoi, string $status)
    {
        $cauHoi->update(['status' => $status]);
        return $this->getOne($cauHoi->refresh());
    }

    public function copyFromPublic(CauHoi $source, int $nguoiTaoId)
    {
        if ($source->status !== 'public') {
            throw new BusinessException('Chỉ được sao chép từ câu hỏi công khai', 422);
        }

        return DB::transaction(function () use ($source, $nguoiTaoId) {
            $source->load('cauTraLois');

            $newQuestionData = [
                'monHocId' => $source->monHocId,
                'chuongId' => $source->chuongId,
                'noiDungCauHoi' => $source->noiDungCauHoi,
                'doKhoId' => $source->doKhoId,
                'imageUrl' => $source->imageUrl,
                'giaiThichDapAn' => $source->giaiThichDapAn,
                'diemMacDinh' => $source->diemMacDinh,
                'nguoiTaoId' => $nguoiTaoId,
                'soLuotSuDung' => 0,
                'status' => 'private',
                'isDeleted' => false,
            ];

            $newQuestion = CauHoi::create($newQuestionData);

            $answers = $source->cauTraLois->map(function ($answer) {
                return [
                    'noiDungLuaChon' => $answer->noiDungLuaChon,
                    'isCorrectAnswer' => $answer->isCorrectAnswer,
                ];
            })->values()->all();

            $newQuestion->cauTraLois()->createMany($answers);

            return $this->getOne($newQuestion);
        });
    }

    public function getById(int $id)
    {
        $cauHoi = CauHoi::findOrFail($id);
        return $cauHoi;
    }

    public function getCauTraLois(int $id)
    {
        $cauHoi = CauHoi::findOrFail($id);
        $cauHoi->load('cauTraLois');
        return $cauHoi->cauTraLois;
    }

    private function applyFilters(Builder $query, array $filters): void
    {
        if (!empty($filters['monHocId'])) {
            $query->where('monHocId', $filters['monHocId']);
        }

        if (!empty($filters['doKhoId'])) {
            $query->where('doKhoId', $filters['doKhoId']);
        }

        if (!empty($filters['chuongId'])) {
            $query->where('chuongId', $filters['chuongId']);
        }

        if (!empty($filters['nguoiTaoId'])) {
            $query->where('nguoiTaoId', $filters['nguoiTaoId']);
        }

        if (!empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        if (!empty($filters['keyword'])) {
            $keyword = trim((string) $filters['keyword']);
            $query->where(function (Builder $inner) use ($keyword) {
                $inner->where('noiDungCauHoi', 'like', "%{$keyword}%")
                    ->orWhere('giaiThichDapAn', 'like', "%{$keyword}%")
                    ->orWhereHas('cauTraLois', function (Builder $answerQuery) use ($keyword) {
                        $answerQuery->where('noiDungLuaChon', 'like', "%{$keyword}%");
                    });
            });
        }

        if (!empty($filters['bank'])) {
            if ($filters['bank'] === 'public') {
                $query->where('status', 'public');
            }

            if ($filters['bank'] === 'personal' && !empty($filters['nguoiTaoId'])) {
                $query->where('nguoiTaoId', $filters['nguoiTaoId']);
            }
        }
    }

    private function syncAnswers(CauHoi $cauHoi, array $answers): void
    {
        $answerIds = [];

        foreach ($answers as $answer) {
            if (!empty($answer['id'])) {
                $cauTraLoi = $cauHoi->cauTraLois()->where('id', $answer['id'])->first();
                if ($cauTraLoi) {
                    $cauTraLoi->update([
                        'noiDungLuaChon' => $answer['noiDungLuaChon'],
                        'isCorrectAnswer' => $answer['isCorrectAnswer'],
                    ]);
                    $answerIds[] = $cauTraLoi->id;
                    continue;
                }
            }

            $newAnswer = $cauHoi->cauTraLois()->create([
                'noiDungLuaChon' => $answer['noiDungLuaChon'],
                'isCorrectAnswer' => $answer['isCorrectAnswer'],
            ]);
            $answerIds[] = $newAnswer->id;
        }

        $cauHoi->cauTraLois()->whereNotIn('id', $answerIds)->delete();
    }

    private function validateReferenceConsistency(array $data): void
    {
        if (empty($data['chuongId']) || empty($data['monHocId'])) {
            return;
        }

        $belongsToMonHoc = Chuong::query()
            ->where('id', $data['chuongId'])
            ->where('monHocId', $data['monHocId'])
            ->exists();

        if (!$belongsToMonHoc) {
            throw new \InvalidArgumentException('Chương không thuộc môn học đã chọn');
        }
    }
}
