<?php

use Illuminate\Database\Seeder;

class GroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group = new \App\Group();
        $group->name = 'C0220H2';
        $group->desc = 'C0220H2';
        $group->save();

        $group = new \App\Group();
        $group->name = 'C0520H2';
        $group->desc = 'C0520H2';
        $group->save();
    }
}
