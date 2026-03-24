<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCauTraLoiRequest;
use App\Http\Requests\UpdateCauTraLoiRequest;
use App\Models\CauTraLoi;
use App\Services\CauTraLoiService;
use App\Traits\ApiResponseTrait;

class CauTraLoiController extends Controller
{
    use ApiResponseTrait;

    protected CauTraLoiService $cauTraLoiService;

    public function __construct(CauTraLoiService $cauTraLoiService)
    {
        $this->cauTraLoiService = $cauTraLoiService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->cauTraLoiService->getAll();
        return $this->success($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCauTraLoiRequest $request)
    {
        $data = $this->cauTraLoiService->add($request->validated());
        return $this->success($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CauTraLoi $cautraloi)
    {
        $data = $this->cauTraLoiService->getOne($cautraloi);
        return $this->success($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCauTraLoiRequest $request, CauTraLoi $cautraloi)
    {
        $data = $this->cauTraLoiService->update($request->validated(), $cautraloi);
        return $this->success($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CauTraLoi $cautraloi)
    {
        $result = $this->cauTraLoiService->delete($cautraloi);
        return $this->success($result);
    }
}
