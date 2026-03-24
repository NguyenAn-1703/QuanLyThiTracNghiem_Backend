<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UserService
{
    public function getAll()
    {
        return User::all();
    }
    public function getOne(User $user)
    {
        return $user;
    }

    public function add(array $data) {
        return User::create($data);
    }

    public function update(array $data, User $user){
        $user->update($data);
        return $user;
    }

    public function delete(User $user){
        return $user->delete();
    }

    public function changepassword(array $data, User $user){
        $currentPassword = $data["currentPassword"];
        $newPassword = $data["newPassword"];

        $userPassword = $user->password;
        //validate
        if(!Hash::check($currentPassword, $userPassword)){
            throw new HttpException(400, "Mật khẩu cũ không khớp");
        }
        //update
        $dataUpdate = [
            "password" => $newPassword,
        ];

        return $user->update($dataUpdate);
    }
}
