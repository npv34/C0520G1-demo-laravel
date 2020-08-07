<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new \App\Role();
        $role->name= 'admin';
        $role->save();
        $role = new \App\Role();
        $role->name= 'user';
        $role->save();
        $role = new \App\Role();
        $role->name= 'manager';
        $role->save();
    }
}
