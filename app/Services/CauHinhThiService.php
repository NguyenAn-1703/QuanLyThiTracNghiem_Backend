<?php

namespace App\Services;

use App\Models\CauHinhThi;

class CauHinhThiService
{
    public function getAll()
    {
        return CauHinhThi::with('deThi')->get();
    }

    public function getOne(CauHinhThi $cauHinhThi): CauHinhThi
    {
        return $cauHinhThi->load('deThi');
    }

    public function create(array $data): CauHinhThi
    {
        $cauHinhThi = CauHinhThi::create($data);
        return $cauHinhThi->load('deThi');
    }

    public function update(CauHinhThi $cauHinhThi, array $data): CauHinhThi
    {
        $cauHinhThi->update($data);
        return $cauHinhThi->load('deThi');
    }

    public function delete(CauHinhThi $cauHinhThi): bool
    {
        return (bool) $cauHinhThi->delete();
    }

    public function findByDeThiId(int $deThiId): ?CauHinhThi
    {
        return CauHinhThi::where('deThiId', $deThiId)->first();
    }
}
