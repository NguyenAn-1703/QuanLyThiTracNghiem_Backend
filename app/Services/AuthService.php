<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
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

        $role = $this->roleService->getRoleDetailById($user->nhomQuyenId) ?? "sinh viên";

        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'me' => Auth::guard('api')->user(),
            'role' => $role
        ]);
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
