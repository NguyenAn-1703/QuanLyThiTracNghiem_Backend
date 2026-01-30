<?php
namespace App\Services;

use App\Models\Ranking;

class RankingService
{
    public function getAllProducts(int $perPage = 10)
    {
        return Ranking::paginate($perPage);
    }

    public function createRanking(array $data): Ranking
    {
        return Ranking::create($data);
    }

    public function deleteRanking(int $id)
    {
        return Ranking::findOrFail($id)->delete();
    }
}
