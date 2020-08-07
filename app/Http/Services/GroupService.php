<?php


namespace App\Http\Services;


use App\Http\Repositories\GroupRepository;

class GroupService
{
    protected $groupRepo;

    public function __construct(GroupRepository $groupRepo)
    {
        $this->groupRepo = $groupRepo;
    }

    function getAll()
    {
        return $this->groupRepo->getAll();
    }
}
