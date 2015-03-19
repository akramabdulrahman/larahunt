<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Larahunt\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Seed the database.
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('users')->delete();

        foreach (range(1, 10) as $i) {
            $user = User::create([
                'id' => $i,
                'email' => $faker->email,
                'username' => $faker->userName,
                'name' => $faker->name,
                'access_token' => Str::random(40)
            ]);

            $user->roles()->attach(3);
        }
    }
}
