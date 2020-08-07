@extends('layout.master');
@section('page-title','Danh sach users')
@section('content')
    <div class="card mt-4">
        <div class="card-header">
            Users
        </div>
        <div class="card-body">
            <a href="{{ route('users.create') }}" class="btn btn-success">Add</a>
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $key => $user)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>
                            @if($user['role_id'] == \App\Http\Controllers\RoleConstant::ADMIN)
                                {{ 'Admin' }}
                            @elseif($user['role_id'] == \App\Http\Controllers\RoleConstant::USER)
                                {{ 'User' }}
                            @endif
                        </td>
                        <td><a href="{{ route('users.showFormEdit', $user['id']) }}" class="btn btn-primary">Edit</a></td>
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
