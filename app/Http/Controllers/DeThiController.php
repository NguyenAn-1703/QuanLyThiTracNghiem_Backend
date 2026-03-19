<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeThiRequest;
use App\Http\Requests\UpdateDeThiRequest;
use App\Models\DeThi;
use App\Services\DeThiService;
use App\Traits\ApiResponseTrait;

class DeThiController extends Controller
{
    use ApiResponseTrait;

    private DeThiService $deThiService;

    public function __construct(DeThiService $deThiService)
    {
        $this->deThiService = $deThiService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->deThiService->getAll();
        return $this->success($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDeThiRequest $request)
    {
        $data = $this->deThiService->add($request->validated());
        return $this->success($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(DeThi $dethi)
    {
        $data = $this->deThiService->getOne($dethi);
        return $this->success($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDeThiRequest $request, DeThi $dethi)
    {
        $data = $this->deThiService->update($request->validated(), $dethi);
        return $this->success($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeThi $dethi)
    {
        $data = $this->deThiService->delete($dethi);
        return $this->success($data);
    }
}
