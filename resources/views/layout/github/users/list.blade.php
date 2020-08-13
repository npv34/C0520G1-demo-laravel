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
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Link github</th>
                    <th scope="col">Image</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $key => $user)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td><a href="{{ route('github.users.detail', $user->login ) }}">{{ $user->login }}</a></td>
                        <td><a target="_blank" href="{{ $user->html_url }}">{{ $user->html_url }}</a></td>
                        <td>
                            <img width="150" src="{{ $user->avatar_url }}" alt="">
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
