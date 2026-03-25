<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreThongBaoRequest;
use App\Http\Requests\UpdateThongBaoRequest;
use App\Models\ThongBao;
use App\Services\ThongBaoService;
use App\Traits\ApiResponseTrait;

class ThongBaoController extends Controller
{
    use ApiResponseTrait;

    private ThongBaoService $thongBaoService;

    public function __construct(ThongBaoService $thongBaoService)
    {
        $this->thongBaoService = $thongBaoService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->thongBaoService->getAll();
        return $this->success($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreThongBaoRequest $request)
    {
        $data = $this->thongBaoService->add($request->validated());
        return $this->success($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ThongBao $thongbao)
    {
        $data = $this->thongBaoService->getOne($thongbao);
        return $this->success($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateThongBaoRequest $request, ThongBao $thongbao)
    {
        $data = $this->thongBaoService->update($request->validated(), $thongbao);
        return $this->success($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ThongBao $thongbao)
    {
        $data = $this->thongBaoService->delete($thongbao);
        return $this->success($data);
    }
}
