<?php


namespace App\Http\Repositories;


use App\Group;

class GroupRepository
{
    protected $group;

    public function __construct(Group $group)
    {
        $this->group = $group;
    }

    function getAll()
    {
        return $this->group->all();
    }
}
