<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePhanCongRequest;
use App\Models\PhanCong;
use App\Models\User;
use App\Services\PhanCongService;
use App\Traits\ApiResponseTrait;

class PhanCongController extends Controller
{
    use ApiResponseTrait;

    private PhanCongService $phanCongService;

    public function __construct(PhanCongService $phanCongService)
    {
        $this->phanCongService = $phanCongService;
    }

    public function index()
    {
        $data = $this->phanCongService->getAll();
        return $this->success($data);
    }

    public function store(StorePhanCongRequest $request)
    {
        $data = $this->phanCongService->add($request->validated());
        return $this->success($data, 201);
    }

    public function destroy(int $giangvienid, int $monhocid){
        $data = $this->phanCongService->delete($giangvienid, $monhocid);
        return $this->success($data);
    }

    public function get_o_gvien(User $user){
        $data = $this->phanCongService->get_o_gvien($user);
        return $this->success($data);
    }

}
