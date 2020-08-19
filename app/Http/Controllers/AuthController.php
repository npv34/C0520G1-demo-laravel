<?php

namespace App\Http\Controllers;

use App\Http\Services\AuthService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $data = [
            "username" => $request->username,
            "password" => $request->password
        ];

        if (!Auth::attempt($data)) {
            return redirect()->route('auth.login');
        }

        return redirect()->route('users.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
