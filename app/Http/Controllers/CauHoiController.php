<?php

namespace App\Http\Controllers;

use App\Models\CauHoi;
use App\Traits\ApiResponseTrait;
use CauHoiService;
use Illuminate\Http\Request;

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
    public function index(Request $request)
    {
        $data = $this->cauHoiService->getAll();
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
    public function show(CauHoi $cauHoi)
    {
        $cauHoi = $this->cauHoiService->getOne($cauHoi);
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
    public function destroy(CauHoi $cauHoi)
    {
        //
    }
}
