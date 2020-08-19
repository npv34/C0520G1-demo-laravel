@extends('layout.master');
@section('page-title','Danh sach users')
@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <div class="row">
                <div class="col-md-2">
                    {{ __('message.users') }}
                </div>
                <div class="col-md-6">
                    <input type="text" id="search-user" name="keyword">
                </div>
            </div>


        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    @can('crud-user')
                        <a href="{{ route('users.create') }}" class="btn btn-success">Add</a>
                    @endcan

                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary dropdown-toggle mr-4" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Basic dropdown
                    </button>

                    <div class="dropdown-menu">
                        <a class="dropdown-item">
                            <!-- Default unchecked -->
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox1" checked>
                                <label class="custom-control-label" id="show-hide-name" for="checkbox1">Name</label>
                            </div>
                        </a>
                        <a class="dropdown-item" href="#">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox2" checked>
                                <label class="custom-control-label" id="show-hide-email" for="checkbox2">Email</label>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox4" checked>
                                <label class="custom-control-label" id="show-hide-all" for="checkbox4">Check All</label>
                            </div>
                        </a>
                    </div>
                </div>

            </div>

            <!-- Basic dropdown -->
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" class="user-name">Name</th>
                    <th scope="col" class="user-email">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $key => $user)
                    <tr class="user-item" id="user-{{$user->id}}">
                        <th scope="row">{{ $key + 1 }}</th>
                        <td class="user-name">{{ $user->username }}</td>
                        <td class="user-email">{{ $user->email }}</td>
                        <td>
                            @foreach($user->roles as $role)
                                {{$role->name}}<br>
                            @endforeach
                        </td>
                        <td>
                            @can('crud-user')
                                <a href="{{ route('users.showFormEdit', $user->id) }}" class="btn btn-primary">Edit</a>

                                <button class="btn btn-danger delete-user" data-id="{{ $user->id }}">Delete</button>

                            @endcan
                        </td>


                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No data</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
