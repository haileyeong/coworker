<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'regex:/^[가-힣]+$/', 'max:255'],
            'nickname' => ['required', 'string', 'unique:users,nickname', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/', // 소문자 포함
                'regex:/[0-9]/', // 숫자 포함
                'confirmed', // 비밀번호 확인
            ],
        ]);
//        ,
//            [
//            'name.required' => '이름을 입력해주세요.',
//            'name.regex' => '이름을 정확하게 입력해주세요.',
//            'nickname.required' => '닉네임을 입력해주세요.',
//            'nickname.unique' => '이미 사용중인 닉네임입니다.',
//            'email.required' => '이메일을 입력해주세요.',
//            'email.lowercase' => '이메일은 소문자로 입력해야 합니다.',
//            'email.unique' => '이메일은 이미 사용 중입니다.',
//            'password.required' => '비밀번호를 입력해주세요.',
//            'password.min' => '비밀번호는 최소 8자 이상이어야 합니다.',
//            'password.regex' => '비밀번호는 소문자와 숫자를 포함해야 합니다.',
//            'password.confirmed' => '비밀번호가 일치하지 않습니다.',
//        ]);

        $verificationCode = mt_rand(100000, 999999);

        $user = User::create([
            'name' => $request->name,
            'nickname' => $request->nickname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verification_code' => $verificationCode,
        ]);

        return redirect()->route('login')->with('status', '회원가입이 완료되었습니다. 로그인해주세요.');
    }

    public function checkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $exists = User::where('email', $request->email)->exists();

        return response()->json(['exists' => $exists]);
    }

}
