<?php

namespace App\Http\Controllers;

use App\Models\RoleDetail;
use App\Http\Requests\StoreRoleDetailRequest;
use App\Http\Requests\UpdateRoleDetailRequest;
use App\Traits\ApiResponseTrait;

class RoleDetailController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = RoleDetail::all();
        return $this->success($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoleDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoleDetail  $roleDetail
     * @return \Illuminate\Http\Response
     */
    public function show(RoleDetail $roleDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoleDetailRequest  $request
     * @param  \App\Models\RoleDetail  $roleDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleDetailRequest $request, RoleDetail $roleDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoleDetail  $roleDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoleDetail $roleDetail)
    {
        //
    }
}
