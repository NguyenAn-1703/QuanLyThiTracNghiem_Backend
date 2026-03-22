<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChiTietBaiLamRequest;
use App\Http\Requests\UpdateChiTietBaiLamRequest;
use App\Models\ChiTietBaiLam;
use App\Services\ChiTietBaiLamService;
use App\Traits\ApiResponseTrait;

class ChiTietBaiLamController extends Controller
{
    use ApiResponseTrait;

    protected ChiTietBaiLamService $chiTietBaiLamService;

    public function __construct(ChiTietBaiLamService $chiTietBaiLamService)
    {
        $this->chiTietBaiLamService = $chiTietBaiLamService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->chiTietBaiLamService->getAll();
        return $this->success($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChiTietBaiLamRequest $request)
    {
        $chiTiet = $this->chiTietBaiLamService->add($request->validated());
        return $this->success($chiTiet, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ChiTietBaiLam $chitietbailam)
    {
        $data = $this->chiTietBaiLamService->getOne($chitietbailam);
        return $this->success($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChiTietBaiLamRequest $request, ChiTietBaiLam $chitietbailam)
    {
        $chiTiet = $this->chiTietBaiLamService->update($request->validated(), $chitietbailam);
        return $this->success($chiTiet);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChiTietBaiLam $chitietbailam)
    {
        $result = $this->chiTietBaiLamService->delete($chitietbailam);
        return $this->success($result);
    }
}
