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
}
