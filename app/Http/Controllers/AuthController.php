<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return $this->success($this->authService->me());
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

    public function handleGoogleCallback()
    {
        try {
            $data = $this->authService->handleGoogleCallback();
            // Lấy địa chỉ Frontend từ file .env, nếu không có thì mặc định là localhost
            $frontendBaseUrl = env('FRONTEND_URL', 'http://localhost:5173');

            // Đường dẫn đến trạm đón đã tạo ở FE
            $callbackPath = "/auth/callback";

            // Kiểm tra nếu có lỗi trả về từ Service
            if (isset($data['error'])) {
                // Redirect về Frontend kèm mã lỗi dưới dạng Query String
                return redirect($frontendBaseUrl . $callbackPath . '?error=' . $data['error']);
            }

            $token = $data['access_token'];
            $name = urlencode($data['me']['username']);
            $email = $data['me']['email'];

            // Redirect vèo một cái về đúng Frontend
            return redirect($frontendBaseUrl . $callbackPath . "?token=" . $token . "&name=" . $name . "&email=" . $email);
        } catch (HttpException $e) {
            return $this->error(null, $e->getMessage(), $e->getStatusCode());
        } catch (Throwable $e) {
            return $this->serverError();
        }
    }
}
