<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLogBaiLamRequest;
use App\Http\Requests\UpdateLogBaiLamRequest;
use App\Models\BaiLam;
use App\Models\LogBaiLam;
use App\Services\LogBaiLamService;
use App\Traits\ApiResponseTrait;

class LogBaiLamController extends Controller
{
    use ApiResponseTrait;

    protected LogBaiLamService $logBaiLamService;

    public function __construct(LogBaiLamService $logBaiLamService)
    {
        $this->logBaiLamService = $logBaiLamService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->logBaiLamService->getAll();
        return $this->success($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLogBaiLamRequest $request)
    {
        $data = $this->logBaiLamService->add($request->validated());
        return $this->success($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(LogBaiLam $logbailam)
    {
        $data = $this->logBaiLamService->getOne($logbailam);
        return $this->success($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLogBaiLamRequest $request, BaiLam $bailam)
    {
        $log = $this->logBaiLamService->update($request->validated(), $bailam);
        return $this->success($log);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LogBaiLam $logbailam)
    {
        $result = $this->logBaiLamService->delete($logbailam);
        return $this->success($result);
    }
}
