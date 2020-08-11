<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Services\GroupService;
use App\Http\Services\UserService;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    protected $userService;
    protected $groupService;

    public function __construct(UserService $userService,
                                GroupService $groupService)
    {
        $this->userService = $userService;
        $this->groupService = $groupService;
    }

    public function index()
    {
        $users = $this->userService->all();
        return view('layout.users.list', compact('users'));
    }

    public function showFormEdit($id)
    {

    }

    public function create()
    {
        $groups = $this->groupService->getAll();
        $roles = Role::all();
        return view('layout.users.create', compact('groups', 'roles'));
    }

    public function store(CreateUserRequest $request)
    {

        DB::beginTransaction();
        try {
            $user = new User();
            $user->fill($request->all());
            $user->save();
            $user->roles()->sync($request->role);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            echo $exception->getMessage();
        }

    }
}
