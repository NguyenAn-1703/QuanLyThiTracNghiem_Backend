<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChiTietDeThiController extends Controller
{
    use ApiResponseTrait;

    protected ChiTietDeThiService $chiTietDeThiService;

    public function __construct(ChiTietDeThiService $chiTietDeThiService)
    {
        $this->chiTietDeThiService = $chiTietDeThiService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ChiTietDeThi::all();
        return $this->success(ChiTietDeThiResource::collection($data), 'Lấy danh sách chi tiết đề thi thành công');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChiTietDeThiRequest $request)
    {
        $chiTiet = $this->chiTietDeThiService->createChiTietDeThi($request->validated());
        return $this->success($chiTiet, 'Tạo chi tiết đề thi thành công', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ChiTietDeThi $chiTietDeThi)
    {
        $data = $this->chiTietDeThiService->getChiTietDeThiDetail($chiTietDeThi);
        return $this->success($data, 'Lấy chi tiết đề thi thành công');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChiTietDeThiRequest $request, ChiTietDeThi $chiTietDeThi)
    {
        $chiTiet = $this->chiTietDeThiService->updateChiTietDeThi($request->validated(), $chiTietDeThi->id);
        return $this->success($chiTiet, 'Cập nhật chi tiết đề thi thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChiTietDeThi $chiTietDeThi)
    {
        $result = $this->chiTietDeThiService->deleteChiTietDeThi($chiTietDeThi->id);
        return $this->success($result, 'Xóa chi tiết đề thi thành công');
    }
}
