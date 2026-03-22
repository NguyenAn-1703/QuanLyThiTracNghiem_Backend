<?php
namespace App\Services;

use App\Models\DoKho;

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
        return (bool) $doKho->delete();
    }

    private function validateBusiness(array $data): void
    {
        //
    }
}
