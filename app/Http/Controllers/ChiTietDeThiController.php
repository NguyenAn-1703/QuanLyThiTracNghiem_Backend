<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChiTietDeThiRequest;
use App\Http\Requests\UpdateChiTietDeThiRequest;
use App\Models\ChiTietDeThi;
use App\Services\ChiTietDeThiService;
use App\Traits\ApiResponseTrait;

class ChiTietDeThiController extends Controller
{
    use ApiResponseTrait;

    protected ChiTietDeThiService $chiTietDeThiService;

    public function __construct(ChiTietDeThiService $chiTietDeThiService)
    {
        $this->chiTietDeThiService = $chiTietDeThiService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->chiTietDeThiService->getAll();
        return $this->success($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChiTietDeThiRequest $request)
    {
        $chiTiet = $this->chiTietDeThiService->add($request->validated());
        return $this->success($chiTiet, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ChiTietDeThi $chitietdethi)
    {
        $data = $this->chiTietDeThiService->getOne($chitietdethi);
        return $this->success($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChiTietDeThiRequest $request, ChiTietDeThi $chitietdethi)
    {
        $chiTiet = $this->chiTietDeThiService->update($request->validated(), $chitietdethi);
        return $this->success($chiTiet);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChiTietDeThi $chitietdethi)
    {
        $result = $this->chiTietDeThiService->delete($chitietdethi);
        return $this->success($result);
    }
}
