<?php

namespace App\Services;

use App\Exceptions\BusinessException;
use App\Models\DoKho;
use Illuminate\Validation\ValidationException;

class DoKhoService
{
    public function getAll()
    {
        return DoKho::all();
    }

    public function getOne(DoKho $doKho): DoKho
    {
        return $doKho;
    }

    public function create(array $data): DoKho
    {
        $this->validateBusiness($data);
        return DoKho::create($data);
    }

    public function update(DoKho $DoKho, array $data): DoKho
    {
        $this->validateBusiness($data);
        $DoKho->update($data);
        return $DoKho;
    }

    public function delete(DoKho $doKho): bool
    {
        // Kiểm tra có câu hỏi liên quan chưa
        if ($doKho->cauHois()->exists()) {
            throw ValidationException::withMessages([
                'doKho' => ['Độ khó đang được sử dụng, không thể xóa.'],
            ]);
        }
        return (bool) $doKho->delete();
    }

    private function validateBusiness(array $data): void
    {
        //
    }
}
