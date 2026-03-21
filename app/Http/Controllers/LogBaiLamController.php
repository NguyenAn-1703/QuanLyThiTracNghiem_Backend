<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLogBaiLamRequest;
use App\Http\Requests\UpdateLogBaiLamRequest;
use App\Models\LogBaiLam;
use App\Traits\ApiResponseTrait;
use LogBaiLamService;

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
    public function show(LogBaiLam $logBaiLam)
    {
        $data = $this->logBaiLamService->getOne($logBaiLam);
        return $this->success($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLogBaiLamRequest $request, LogBaiLam $logBaiLam)
    {
        $log = $this->logBaiLamService->update($request->validated(), $logBaiLam);
        return $this->success($log);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LogBaiLam $logBaiLam)
    {
        $result = $this->logBaiLamService->delete($logBaiLam);
        return $this->success($result);
    }
}
