<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenerateDeThiByFilterRequest;
use App\Http\Requests\StoreDeThiRequest;
use App\Http\Requests\UpdateDeThiRequest;
use App\Models\DeThi;
use App\Models\NhomHocPhan;
use App\Models\User;
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

    public function generate_dethis_by_fiter(GenerateDeThiByFilterRequest $request)
    {
        $data = $this->deThiService->generateByFilter($request->validated());
        return $this->success($data, 201);
    }

    public function preview_generate_dethis_by_fiter(GenerateDeThiByFilterRequest $request)
    {
        $data = $this->deThiService->previewGenerateByFilter($request->validated());
        return $this->success($data);
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
        $data = $this->deThiService->delete($dethi->id);
        return $this->success($data);
    }

    public function get_osvien(User $user)
    {
        $data = $this->deThiService->get_osvien($user);
        return $this->success($data);
    }
    public function get_ad(DeThi $dethi)
    {
        $data = $this->deThiService->getAd($dethi);
        return $this->success($data);
    }

    public function get_by_nhomhocphan_svien(NhomHocPhan $nhomhocphan, User $user)
    {
        $data = $this->deThiService->get_by_nhomhocphan_svien($nhomhocphan, $user);
        return $this->success($data);
    }
}
