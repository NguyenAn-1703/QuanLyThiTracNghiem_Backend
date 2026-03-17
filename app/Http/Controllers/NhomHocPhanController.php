<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNhomHocPhanRequest;
use App\Http\Requests\UpdateNhomHocPhanRequest;
use App\Models\NhomHocPhan;
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
    public function show(NhomHocPhan $nhomHocPhan)
    {
        $data = $this->nhomHocPhanService->getOne($nhomHocPhan);
        return $this->success($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNhomHocPhanRequest $request, NhomHocPhan $nhomHocPhan)
    {
        $data = $this->nhomHocPhanService->update($request->validated(), $nhomHocPhan);
        return $this->success($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NhomHocPhan $nhomHocPhan)
    {
        $data = $this->nhomHocPhanService->delete($nhomHocPhan);
        return $this->success($data);
    }
}
