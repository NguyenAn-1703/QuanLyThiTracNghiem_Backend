<?php

namespace App\Services;

use GuzzleHttp\Exception\ClientException;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\GoogleProvider;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AuthService
{
    protected RoleService $roleService;
    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }
    public function login(array $data)
    {
        $login = $data['login'];
        $password = $data['password'];

        $user = User::where('username', $login)->first();

        if (!$user) {
            $user = User::where('email', $login)->first();
        }

        if (!$user) {
            throw new HttpException(401, 'Invalid credentials');
        }

        $credentials = [
            $user->email === $login ? 'email' : 'username' => $login,
            'password' => $password
        ];

        if (!$token = Auth::guard('api')->attempt($credentials)) {
            throw ValidationException::withMessages([
                'login' => ['Mật khẩu không đúng'],
            ]);
        }

        $role = $user->nhomQuyenId ? $this->roleService->getRoleDetailById($user->nhomQuyenId) : null;

        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'me' => Auth::guard('api')->user(),
            'role' => $role
        ]);
    }

    public function redirectToGoogle(): RedirectResponse
    {
        return $this->googleProvider()->stateless()->redirect();
    }

    public function handleGoogleCallback(): array
    {
        $oauthError = request()->query('error');
        if ($oauthError) {
            throw new HttpException(400, 'Đăng nhập Google bị hủy hoặc thất bại từ phía Google');
        }

        if (!request()->filled('code')) {
            throw new HttpException(400, 'Thiếu mã xác thực Google. Hãy bắt đầu từ endpoint /auth/google/redirect');
        }

        try {
            $googleUser = $this->googleProvider()->stateless()->user();
        } catch (ClientException $e) {
            throw new HttpException(400, 'Mã xác thực Google không hợp lệ hoặc đã hết hạn');
        }

        $email = $googleUser->getEmail();

        if (!$email) {
            throw new HttpException(403, 'Tài khoản của bạn không thuộc phạm vi quản lý của chúng tôi');
        }

        $user = User::where('email', $email)->first();

        if (!$user) {
            throw new HttpException(403, 'Tài khoản của bạn không thuộc phạm vi quản lý của chúng tôi');
        }

        $googleId = $googleUser->getId();
        if (!$user->ggid && $googleId) {
            $user->ggid = $googleId;
            $user->save();
            $user->refresh();
        }

        $token = Auth::guard('api')->login($user);

        if (!$token) {
            throw new HttpException(401, 'Không thể đăng nhập bằng Google');
        }

        $role = $user->nhomQuyenId ? $this->roleService->getRoleDetailById($user->nhomQuyenId) : null;

        return [
            'access_token' => $token,
            'token_type'   => 'bearer',
            'me' => $user,
            'role' => $role,
        ];
    }

    private function googleProvider(): GoogleProvider
    {
        /** @var GoogleProvider $provider */
        $provider = Socialite::driver('google');

        return $provider;
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
