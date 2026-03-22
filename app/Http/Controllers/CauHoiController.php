<?php

namespace App\Http\Controllers;

use App\Models\CauHoi;
use App\Services\CauHoiService;
use App\Traits\ApiResponseTrait;

class CauHoiController extends Controller
{
    use ApiResponseTrait;

    protected CauHoiService $cauHoiService;

    public function __construct(CauHoiService $cauHoiService)
    {
        $this->cauHoiService = $cauHoiService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->cauHoiService->getAll();
        return $this->success($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CauHoi $cauhoi)
    {
        $cauHoi = $this->cauHoiService->getOne($cauhoi);
        return $this->success($cauHoi);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CauHoi $cauhoi)
    {
        //
    }
}
