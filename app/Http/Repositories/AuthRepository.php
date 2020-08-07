<?php


namespace App\Http\Repositories;


class AuthRepository
{
    public function save($user){
        $user->save();
    }
}
