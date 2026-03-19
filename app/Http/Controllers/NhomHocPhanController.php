<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNhomHocPhanRequest;
use App\Http\Requests\ThamGiaNhomRequest;
use App\Http\Requests\UpdateNhomHocPhanRequest;
use App\Models\NhomHocPhan;
use App\Models\User;
use App\Services\NhomHocPhanService;
use App\Traits\ApiResponseTrait;

class NhomHocPhanController extends Controller
{
    use ApiResponseTrait;

    private NhomHocPhanService $nhomHocPhanService;

    public function __construct(NhomHocPhanService $nhomHocPhanService)
    {
        $this->nhomHocPhanService = $nhomHocPhanService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->nhomHocPhanService->getAll();
        return $this->success($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNhomHocPhanRequest $request)
    {
        $data = $this->nhomHocPhanService->add($request->validated());
        return $this->success($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(NhomHocPhan $nhomhocphan)
    {
        $data = $this->nhomHocPhanService->getOne($nhomhocphan);
        // $data = $nhomhocphan;
        return $this->success($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNhomHocPhanRequest $request, NhomHocPhan $nhomhocphan)
    {
        $data = $this->nhomHocPhanService->update($request->validated(), $nhomhocphan);
        return $this->success($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NhomHocPhan $nhomhocphan)
    {
        $data = $this->nhomHocPhanService->delete($nhomhocphan);
        return $this->success($data);
    }

    public function get_w_gvien_mon(NhomHocPhan $nhomhocphan){
        $data = $this->nhomHocPhanService->get_w_gvien_mon($nhomhocphan);
        return $this->success($data);
    }

    public function get_w_dekiemtra(NhomHocPhan $nhomhocphan){
        $data = $this->nhomHocPhanService->get_w_dekiemtra($nhomhocphan);
        return $this->success($data);
    }

    public function join_group(ThamGiaNhomRequest $request){
        $data = $this->nhomHocPhanService->join_group($request->validated());
        return $this->success($data, 201);
    }

    public function get_o_svien(User $user){
        $data = $this->nhomHocPhanService->get_o_svien($user);
        return $this->success($data);
    }
}
