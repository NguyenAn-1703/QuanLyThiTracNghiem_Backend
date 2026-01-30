<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreRankingRequest;
use App\Http\Requests\UpdateRankingRequest;
use App\Http\Resources\RankingResource;
use App\Models\Ranking;
use App\Services\RankingService;
use App\Traits\ApiResponseTrait;

class RankingController extends Controller
{
    use ApiResponseTrait;

    public function __construct(
        protected RankingService $rankingService
    ) {}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $rankings = $this->rankingService->getAllProducts(10);
        return $this->success(RankingResource::collection($rankings));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRankingRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRankingRequest $request)
    {
        $cleanReq = $request->validated();
        $ranking  = $this->rankingService->createRanking($cleanReq);
        return $this->created(new RankingResource($ranking));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ranking  $ranking
     * @return \Illuminate\Http\Response
     */
    public function show(Ranking $ranking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRankingRequest  $request
     * @param  \App\Models\Ranking  $ranking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRankingRequest $request, Ranking $ranking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ranking  $ranking
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        $this->rankingService->deleteRanking($id);
        return $this->deleted('Xóa thành công');
    }
}
