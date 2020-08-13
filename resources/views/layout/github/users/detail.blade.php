@extends('layout.master');
@section('page-title','Danh sach users')
@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <div class="row">
                <div class="col-md-3">
                    Users
                </div>
                <div class="col-md-9">
                    <form class="form-inline my-2 my-lg-0" method="GEt" action="{{ route('github.users.search') }}">
                        <input class="form-control mr-sm-2" name="keyword" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>

        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <td rowspan="2" width="30%">
                        <img width="150" src="{{ $user->avatar_url }}" alt="">
                    </td>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <td>{{ $user->location }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
