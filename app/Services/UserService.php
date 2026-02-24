<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function getAll()
    {
        return User::all();
    }
    public function getOne(User $user)
    {
        return User::findOrFail($user->id);
    }
    // "hoTen" => ["required","string", "max:255"],
    // "email" => ["required","string", "email", "unique:users,email"],
    // "password" => [
    //     "required",
    //     Password::min(6)
    //         ->letters()
    //         ->numbers()
    //         ->mixedCase(),
    //     "confirmed", //cần có trường password_confirmation
    // ],
    // "nhomQuyenId" => ["required","numeric","exists:roles,id"],
    // "sdt" => ["required","numeric", "digits:10"],
    // "username" => ["required","unique:users,username"],
    // "ngaySinh" => ["required","date_format:Y-m-d", "before:today"],
    // "laGioiTinhNu" => ["required","boolean"],
    // "ggid" => ["required","string"],
    // "urlAvatar" => ["string"]
    public function add(array $data) {
        return User::create($data);
    }

    public function update(array $data, int $id){
        $user = User::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete(int $id){
        $user = User::findOrFail($id);
        return $user->delete();
    }
}
