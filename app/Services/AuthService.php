<?php

namespace App\Services;

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

    public function me()
    {
        $user = Auth::guard('api')->user();
        $role = $user->nhomQuyenId ? $this->roleService->getRoleDetailById($user->nhomQuyenId) : null;
        return response()->json([
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
        $googleUser = $this->googleProvider()->stateless()->user();
        $email = $googleUser->getEmail();

        if (!$email) {
            return(["error" => "unauthorized_domain"]);
        }

        $user = User::where('email', $email)->first();

        if (!$user) {
            return(["error" => "unauthorized_domain"]);
        }

        $googleId = $googleUser->getId();
        if (!$user->ggid && $googleId) {
            $user->ggid = $googleId;
            $user->save();
            $user->refresh();
        }

        $token = Auth::guard('api')->login($user);

        if (!$token) {
            return(["error" => "login_failed"]);
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

    public function logout()
    {
        Auth::logout();

        return response()->json([
            'message' => 'Đăng xuất thành công'
        ]);
    }
}
