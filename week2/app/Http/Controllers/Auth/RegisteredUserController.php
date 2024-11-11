<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Service\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            $this->userService->register($request);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        }

        return redirect()->route('login')->with('status', '회원가입이 완료되었습니다. 로그인해주세요.');
    }

    public function checkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $exists = $this->userService->checkEmailExists($request->email);

        return response()->json(['exists' => $exists]);
    }

}
