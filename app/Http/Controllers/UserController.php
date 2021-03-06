<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Services\GroupService;
use App\Http\Services\UserService;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        if (!Gate::allows('crud-user')){
            abort(403);
        }
        $user = $this->userService->getById($id);
        $roles = Role::all();
        $groups = $this->groupService->getAll();
        return view('layout.users.edit',compact('user','roles','groups'));
    }


    public function create()
    {
        if (!Gate::allows('crud-user')){
            abort(403);
        }

        $groups = $this->groupService->getAll();
        $roles = Role::all();
        return view('layout.users.create', compact('groups', 'roles'));
    }

    public function store(CreateUserRequest $request)
    {
        if (!Gate::allows('crud-user')){
            abort(403);
        }

        DB::beginTransaction();
        try {
            $user = new User();
            $user->fill($request->all());
            $user->password = Hash::make($request->password);
            $user->save();
            $user->roles()->sync($request->role);
            DB::commit();
            return redirect()->route('users.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            echo $exception->getMessage();
        }
    }

    public function delete($id) {
        if (!Gate::allows('crud-user')){
            abort(403);
        }

        $user = $this->userService->getById($id);
        $user->delete();
        $result = [
            "status" => 'success',
            "message" => 'delete success'
        ];

        return response()->json($result);
    }

    public function search(Request $request) {
        $keyword = $request->keyword;
        $users = User::where('name','LIKE','%' . $keyword . '%')->get();
        $result = [
            "status" => 'success',
            "data" => $users
        ];

        return response()->json($result);
    }
}
