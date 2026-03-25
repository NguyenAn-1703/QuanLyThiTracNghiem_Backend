<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChuongRequest;
use App\Http\Requests\UpdateChuongRequest;
use App\Http\Resources\ChuongResource;
use App\Models\Chuong;
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
    public function update(UpdateChuongRequest $request, Chuong $chuong)
    {
        $chuong = $this->service->update($chuong, $request->validated());
        return $this->updated(new ChuongResource($chuong->load('monHoc')));
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
}
