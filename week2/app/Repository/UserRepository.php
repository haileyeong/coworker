<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{

    public function create($name, $nickname, $email, $password)
    {
        return User::create([
            'name' => $name,
            'nickname' => $nickname,
            'email' => $email,
            'password' => Hash::make($password), //bcrypt()
        ]);
    }

    public function checkedEmail($email): bool
    {
        return User::where('email', $email)->exists();
    }
}
