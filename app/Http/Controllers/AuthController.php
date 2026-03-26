<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponseTrait;

    protected AuthService $authService;

    public function __construct(AuthService $authService) {
        $this->authService = $authService; 
    }

    public function login(LoginRequest $request)
    {
        return $this->success($this->authService->login($request->validated()));
    }

    public function me()
    {
        return response()->json(Auth::user());
    }

    public function logout()
    {
        Auth::logout();

        return response()->json([
            'message' => 'Đăng xuất thành công'
        ]);
    }
}
