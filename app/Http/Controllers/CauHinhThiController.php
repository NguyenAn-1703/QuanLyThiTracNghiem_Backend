<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCauHinhThiRequest;
use App\Http\Requests\UpdateCauHinhThiRequest;
use App\Http\Resources\CauHinhThiResource;
use App\Models\CauHinhThi;
use App\Services\CauHinhThiService;
use App\Traits\ApiResponseTrait;

class CauHinhThiController extends Controller
{
    use ApiResponseTrait;

    public function __construct(private CauHinhThiService $service) {}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = $this->service->getAll();
        return $this->success(CauHinhThiResource::collection($data));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCauHinhThiRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreCauHinhThiRequest $request)
    {
        $cauHinhThi = $this->service->create($request->validated());
        return $this->created(new CauHinhThiResource($cauHinhThi));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CauHinhThi  $cauHinhThi
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(CauHinhThi $cauHinhThi)
    {
        $data = $this->service->getOne($cauHinhThi);
        return $this->success(new CauHinhThiResource($data));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCauHinhThiRequest  $request
     * @param  \App\Models\CauHinhThi  $cauHinhThi
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateCauHinhThiRequest $request, CauHinhThi $cauHinhThi)
    {
        $cauHinhThi = $this->service->update($cauHinhThi, $request->validated());
        return $this->updated(new CauHinhThiResource($cauHinhThi));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CauHinhThi  $cauHinhThi
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(CauHinhThi $cauHinhThi)
    {
        $this->service->delete($cauHinhThi);
        return $this->deleted();
    }
}
