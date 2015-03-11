<?php

use Illuminate\Database\Seeder;
use Larahunt\Models\Role;

class RoleTableSeeder extends Seeder
{
    public function run()
    {
        $titles = ['administrator', 'moderator', 'author'];

        foreach ($titles as $title) {
            Role::create(compact('title'));
        }
    }
}
