<?php


namespace App\Http\Services;


use App\Http\Repositories\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function all()
    {
        return $this->userRepository->getAll();
    }

    public function getById($id)
    {
        return $this->userRepository->findById($id);
    }
}
