<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDoKhoRequest;
use App\Http\Requests\UpdateDoKhoRequest;
use App\Http\Resources\DoKhoResource;
use App\Models\DoKho;
use App\Services\DoKhoService;
use App\Traits\ApiResponseTrait;

class DoKhoController extends Controller
{
    use ApiResponseTrait;

    public function __construct(private DoKhoService $service) {}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = $this->service->getAll();
        return $this->success(DoKhoResource::collection($data));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDoKhoRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreDoKhoRequest $request)
    {
        $doKho = $this->service->create($request->validated());
        return $this->created(new DoKhoResource($doKho));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DoKho  $dokho
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(DoKho $dokho)
    {
        $data = $this->service->getOne($dokho);
        return $this->success(new DoKhoResource($data));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDoKhoRequest  $request
     * @param  \App\Models\DoKho  $dokho
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateDoKhoRequest $request, DoKho $dokho)
    {
        $doKho = $this->service->update($dokho, $request->validated());
        return $this->updated(new DoKhoResource($doKho));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DoKho  $dokho
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DoKho $dokho)
    {
        $this->service->delete($dokho);
        return $this->deleted();
    }
}
