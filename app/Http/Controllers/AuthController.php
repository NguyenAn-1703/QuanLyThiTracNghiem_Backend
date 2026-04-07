<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class AuthController extends Controller
{
    use ApiResponseTrait;

    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
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

    public function redirectToGoogle(): RedirectResponse
    {
        return $this->authService->redirectToGoogle();
    }

    public function handleGoogleCallback(Request $request)
    {
        if (!$request->filled('code') && !$request->filled('error')) {
            if ($request->expectsJson()) {
                return $this->error(null, 'Thiếu mã xác thực Google. Hãy bắt đầu từ endpoint /auth/google/redirect', 400);
            }

            return $this->authService->redirectToGoogle();
        }

        try {
            $data = $this->authService->handleGoogleCallback();

            return $this->success($data, 'Đăng nhập Google thành công');
        } catch (HttpException $e) {
            return $this->error(null, $e->getMessage(), $e->getStatusCode());
        } catch (Throwable $e) {
            Log::error('Google callback failed', [
                'message' => $e->getMessage(),
            ]);

            return $this->serverError();
        }
    }
}
