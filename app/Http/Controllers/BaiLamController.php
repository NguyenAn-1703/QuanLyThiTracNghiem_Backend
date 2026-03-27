<?php

namespace App\Http\Controllers;

use App\Http\Requests\StartTestRequest;
use App\Http\Requests\StoreBaiLamRequest;
use App\Http\Requests\SubmitTestRequest;
use App\Http\Requests\UpdateBaiLamRequest;
use App\Http\Requests\UpdateStudentTestRequest;
use App\Models\BaiLam;
use App\Models\User;
use App\Traits\ApiResponseTrait;
use App\Services\BaiLamService;

class BaiLamController extends Controller
{
    use ApiResponseTrait;

    protected BaiLamService $baiLamService;

    public function __construct(BaiLamService $baiLamService)
    {
        $this->baiLamService = $baiLamService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->baiLamService->getAll();
        return $this->success($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBaiLamRequest $request)
    {
        //create BaiLam, LogBaiLam, DsChiTietBaiLam
        $data = $this->baiLamService->add($request->validated());
        return $this->success($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(BaiLam $bailam)
    {
        $baiLam = $this->baiLamService->getOne($bailam);
        return $this->success($baiLam);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBaiLamRequest $request, BaiLam $bailam)
    {
        $data = $this->baiLamService->update($request->validated(), $bailam);
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BaiLam $bailam)
    {
        return $this->baiLamService->delete($bailam);
    }

    public function starttest(StartTestRequest $request){
        return $this->success($this->baiLamService->startTest($request->validated()));
    }

    public function updatestudenttest(UpdateStudentTestRequest $request, BaiLam $bailam){
        return $this->success($this->baiLamService->updatestudenttest($request->validated(), $bailam));
    }

    public function submittest(SubmitTestRequest $request,BaiLam $bailam){
        return $this->success($this->baiLamService->submittest($request->validated(), $bailam->id));
    }

    public function reviewresult(BaiLam $bailam){
        return $this->success($this->baiLamService->reviewresult($bailam));
    }

    public function get_osvien(User $user){
        return $this->success($this->baiLamService->get_osvien($user));
    }
}
