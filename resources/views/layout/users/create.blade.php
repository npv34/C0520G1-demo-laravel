@extends('layout.master');
@section('page-title','Cap nhat thong tin user')
@section('content')
    <div class="card mt-4">
        <div class="card-header">
            Users add
        </div>

        @if($errors->all())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error! </strong> Thao tac them moi khong thanh cong!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control  @if($errors->has('username'))border border-danger @endif" value="{{old('username')}}" name="username">
                    @if($errors->has('username'))
                        <p class="text-danger">{{ $errors->first('username') }}</p>
                    @endif

                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                           placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Group select</label>
                    <select class="form-control" name="group_id">
                        @foreach($groups as $group)
                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Roles select</label>
                    @foreach($roles as $role)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="role[{{$role->id}}]"
                                       value="{{ $role->id }}"> {{ $role->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
