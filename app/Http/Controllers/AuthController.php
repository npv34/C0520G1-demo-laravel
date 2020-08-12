<?php

namespace App\Http\Controllers;

use App\Http\Services\AuthService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    protected $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function showFormRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $this->authService->register($request);
        return view('welcome');
    }

    public function showFormLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        ///kiem tra tai khoan mat khau
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->route('auth.login');
        }
        Session::put('isAuth', true);
        Session::put('userLogin', $user);

        return redirect()->route('users.index');
    }

    public function logout()
    {
        Session::remove('isAuth');
        Session::remove('userLogin');
        return redirect()->route('auth.login');
    }
}
