<?php

declare(strict_types=1);

return [
    'email' => [
        'required' => '이메일 주소는 필수입니다.',
        'unique' => '이 이메일은 이미 사용 중입니다.',
        'email' => '이메일 형식이 잘못되었습니다.',
    ],
    'password' => [
        'required' => '비밀번호는 필수입니다.',
        'min' => '비밀번호는 최소 :min 자 이상이어야 합니다.',
        'regex' => '비밀번호는 소문자와 숫자를 포함해야 합니다.',
        'confirmed' => '비밀번호 확인이 일치하지 않습니다.',
    ],
];
