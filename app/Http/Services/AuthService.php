<?php


namespace App\Http\Services;


use App\Http\Repositories\AuthRepository;
use App\User;

class AuthService
{
    protected $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function register($request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $this->authRepository->save($user);
    }
}
