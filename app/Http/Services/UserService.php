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
        $users = $this->userRepository->getAll();
        $arr = [];

        foreach ($users as $user) {
            if ($user->age > 18) {
                array_push($arr, $user);
            }
        }

        return $arr;
    }

    public function getById($id)
    {
        return $this->userRepository->findById($id);
    }
}
