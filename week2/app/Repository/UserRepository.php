<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function create($name, $nickname, $email, $password)
    {
        return User::create([
            'name'=>$name,
            'nickname'=>$nickname,
            'email'=>$email,
            'password' => bcrypt($password),
        ]);

        return $this->userRepository->create($dto->name, $dto->nickname, $dto->email, $dto->password);
    }
//
//    public function checkedEmail($email)
//    {
//        return User::where('email', $email)->exists();
//    }

}
