<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMonHocRequest;
use App\Http\Requests\UpdateMonHocRequest;
use App\Models\MonHoc;
use App\Services\MonHocService;
use App\Traits\ApiResponseTrait;

class MonHocController extends Controller
{
    use ApiResponseTrait;

    private MonHocService $monHocService;

    public function __construct(MonHocService $monHocService)
    {
        $this->monHocService = $monHocService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->monHocService->getAll();
        return $this->success($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMonHocRequest $request)
    {
        $data = $this->monHocService->add($request->validated());
        return $this->success($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(MonHoc $monhoc)
    {
        $data = $this->monHocService->getOne($monhoc);
        return $this->success($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMonHocRequest $request, MonHoc $monhoc)
    {
        $data = $this->monHocService->update($request->validated(), $monhoc);
        return $this->success($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MonHoc $monhoc)
    {
        $data = $this->monHocService->delete($monhoc);
        return $this->success($data);
    }

    public function get_w_nhp(){
        $data = $this->monHocService->get_w_nhp();
        return $this->success($data);
    }
}
