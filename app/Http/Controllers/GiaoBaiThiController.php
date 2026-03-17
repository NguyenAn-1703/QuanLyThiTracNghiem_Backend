<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGiaoBaiThiRequest;
use App\Http\Requests\UpdateGiaoBaiThiRequest;
use App\Models\GiaoBaiThi;
use App\Services\GiaoBaiThiService;
use App\Traits\ApiResponseTrait;

class GiaoBaiThiController extends Controller
{
    use ApiResponseTrait;

    private GiaoBaiThiService $giaoBaiThiService;

    public function __construct(GiaoBaiThiService $giaoBaiThiService)
    {
        $this->giaoBaiThiService = $giaoBaiThiService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->giaoBaiThiService->getAll();
        return $this->success($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGiaoBaiThiRequest $request)
    {
        $data = $this->giaoBaiThiService->add($request->validated());
        return $this->success($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(GiaoBaiThi $giaoBaiThi)
    {
        $data = $this->giaoBaiThiService->getOne($giaoBaiThi);
        return $this->success($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGiaoBaiThiRequest $request, GiaoBaiThi $giaoBaiThi)
    {
        $data = $this->giaoBaiThiService->update($request->validated(), $giaoBaiThi);
        return $this->success($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GiaoBaiThi $giaoBaiThi)
    {
        $data = $this->giaoBaiThiService->delete($giaoBaiThi);
        return $this->success($data);
    }
}
