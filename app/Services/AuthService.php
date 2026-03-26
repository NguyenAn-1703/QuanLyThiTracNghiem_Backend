<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AuthService
{
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
            throw new HttpException(401, 'Email/Tên đăng nhập hoặc mật khẩu không đúng');
        }

        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'me' => Auth::guard('api')->user(),
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
