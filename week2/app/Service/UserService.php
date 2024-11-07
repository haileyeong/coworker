<?php

namespace App\Service;

use App\DTO\RegisterDTO;
use App\Repository\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(RegisterDTO $dto)
    {
        $validator = Validator::make([
            'name' => ['required', 'string', 'max:255'],
            'nickname' => ['required', 'string', 'unique:users,nickname', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'name.required' => '이름을 입력해주세요.',
            'name.regex' => '이름을 정확하게 입력해주세요.',
            'nickname.required' => '닉네임을 입력해주세요.',
            'nickname.unique' => '이미 사용중인 닉네임입니다.',
            'email.required' => '이메일을 입력해주세요.',
            'email.lowercase' => '이메일은 소문자로 입력해야 합니다.',
            'email.unique' => '이메일은 이미 사용 중입니다.',
            'password.required' => '비밀번호를 입력해주세요.',
            'password.min' => '비밀번호는 최소 8자 이상이어야 합니다.',
            'password.regex' => '비밀번호는 소문자와 숫자를 포함해야 합니다.',
            'password.confirmed' => '비밀번호가 일치하지 않습니다.',
        ]);

        //
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        // 유저 생성
        return $this->userRepository->create($dto->name, $dto->nickname, $dto->email, $dto->password);
    }

}
