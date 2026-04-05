<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeCauHoiStatusRequest;
use App\Http\Requests\StoreCauHoiRequest;
use App\Http\Requests\UpdateCauHoiRequest;
use App\Models\CauHoi;
use App\Models\User;
use App\Services\CauHoiService;
use App\Traits\ApiResponseTrait;
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
        $filters = [
            'monHocId' => $request->query('monHocId'),
            'chuongId' => $request->query('chuongId'),
            'doKhoId' => $request->query('doKhoId'),
            'nguoiTaoId' => $request->query('nguoiTaoId'),
            'status' => $request->query('status'),
            'keyword' => $request->query('keyword'),
            'bank' => $request->query('bank'),
        ];

        $data = $this->cauHoiService->getAll($filters);
        return $this->success($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCauHoiRequest $request)
    {
        $data = $this->cauHoiService->add($request->validated());
        return $this->success($data, 201);
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
    public function update(UpdateCauHoiRequest $request, CauHoi $cauhoi)
    {
        $data = $this->cauHoiService->update($request->validated(), $cauhoi);
        return $this->success($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CauHoi $cauhoi)
    {
        $result = $this->cauHoiService->delete($cauhoi);
        return $this->success($result);
    }

    public function changeStatus(ChangeCauHoiStatusRequest $request, CauHoi $cauhoi)
    {
        $data = $this->cauHoiService->changeStatus($cauhoi, $request->validated()['status']);
        return $this->success($data);
    }

    public function copyFromPublic(Request $request, CauHoi $cauhoi)
    {
        $validated = $request->validate([
            'nguoiTaoId' => ['required', 'integer', 'exists:users,id'],
        ]);

        $data = $this->cauHoiService->copyFromPublic($cauhoi, (int) $validated['nguoiTaoId']);
        return $this->success($data, 201);
    }

    public function getWithPrivate(User $user){
        $data = $this->cauHoiService->getWithPrivate($user->id);
        return $this->success($data);
    }

    public function getAllPublic(){
        $data = $this->cauHoiService->getAllPublic();
        return $this->success($data);
    }

    public function getAllOfUser(User $user){
        $data = $this->cauHoiService->getAllOfUser($user);
        return $this->success($data);
    }
}

