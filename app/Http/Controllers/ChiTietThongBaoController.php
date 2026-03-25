<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChiTietThongBaoRequest;
use App\Http\Requests\UpdateChiTietThongBaoRequest;
use App\Models\ChiTietThongBao;
use App\Services\ChiTietThongBaoService;
use App\Traits\ApiResponseTrait;

class ChiTietThongBaoController extends Controller
{
    use ApiResponseTrait;

    private ChiTietThongBaoService $chiTietThongBaoService;

    public function __construct(ChiTietThongBaoService $chiTietThongBaoService)
    {
        $this->chiTietThongBaoService = $chiTietThongBaoService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->chiTietThongBaoService->getAll();
        return $this->success($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChiTietThongBaoRequest $request)
    {
        $data = $this->chiTietThongBaoService->add($request->validated());
        return $this->success($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ChiTietThongBao $chitietthongbao)
    {
        $data = $this->chiTietThongBaoService->getOne($chitietthongbao);
        return $this->success($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChiTietThongBaoRequest $request, ChiTietThongBao $chitietthongbao)
    {
        $data = $this->chiTietThongBaoService->update($request->validated(), $chitietthongbao);
        return $this->success($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChiTietThongBao $chitietthongbao)
    {
        $data = $this->chiTietThongBaoService->delete($chitietthongbao);
        return $this->success($data);
    }
}
