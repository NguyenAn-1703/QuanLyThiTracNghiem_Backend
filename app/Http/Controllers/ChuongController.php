<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChuongRequest;
use App\Http\Requests\UpdateChuongRequest;
use App\Http\Resources\ChuongResource;
use App\Models\Chuong;
use App\Models\MonHoc;
use App\Services\ChuongService;
use App\Traits\ApiResponseTrait;

class ChuongController extends Controller
{
    use ApiResponseTrait;

    public function __construct(private ChuongService $service) {}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = Chuong::with('monHoc')->get();
        return $this->success(ChuongResource::collection($data));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreChuongRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreChuongRequest $request)
    {
        $chuong = $this->service->create($request->validated());
        return $this->created(new ChuongResource($chuong->load('monHoc')));
    }

    /**
     * Display the specified resource.
     *
     * @param  Chuong  $chuong
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Chuong $chuong)
    {
        return $this->success(new ChuongResource($chuong->load('monHoc')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateChuongRequest  $request
     * @param  Chuong  $chuong
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateChuongRequest $request, MonHoc $monhoc)
    {
        $chuong = $this->service->update($monhoc, $request->validated());
        return $this->success($chuong);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Chuong  $chuong
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Chuong $chuong)
    {
        $chuong->deleteOrFail();
        return $this->deleted();
    }

    public function getByMonHoc(MonHoc $monhoc){
        $data = $this->service->getByMonHoc($monhoc);
        return $this->success($data);
    }

}
