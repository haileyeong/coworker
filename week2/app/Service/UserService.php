<?php

namespace App\Service;

use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'nickname' => ['required', 'string', 'unique:users,nickname', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'regex:/[a-z]/', 'regex:/[0-9]/', 'confirmed'],
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return $this->userRepository->create($request->name, $request->nickname, $request->email, $request->password);
    }

    public function checkEmailExists(string $email): bool
    {
        return $this->userRepository->checkedEmail($email);
    }

}
