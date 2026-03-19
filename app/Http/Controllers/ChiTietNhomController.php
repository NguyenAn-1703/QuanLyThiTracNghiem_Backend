<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChiTietNhomRequest;
use App\Http\Requests\UpdateChiTietNhomRequest;
use App\Models\ChiTietNhom;
use App\Services\ChiTietNhomService;
use App\Traits\ApiResponseTrait;

class ChiTietNhomController extends Controller
{
    use ApiResponseTrait;

    private ChiTietNhomService $chiTietNhomService;

    public function __construct(ChiTietNhomService $chiTietNhomService)
    {
        $this->chiTietNhomService = $chiTietNhomService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->chiTietNhomService->getAll();
        return $this->success($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChiTietNhomRequest $request)
    {
        $data = $this->chiTietNhomService->add($request->validated());
        return $this->success($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ChiTietNhom $chitietnhom)
    {
        $data = $this->chiTietNhomService->getOne($chitietnhom);
        return $this->success($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChiTietNhomRequest $request, ChiTietNhom $chitietnhom)
    {
        $data = $this->chiTietNhomService->update($request->validated(), $chitietnhom);
        return $this->success($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChiTietNhom $chitietnhom)
    {
        $data = $this->chiTietNhomService->delete($chitietnhom);
        return $this->success($data);
    }
}
