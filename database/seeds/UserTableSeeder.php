<?php

/*
 * This file is part of Larahunt.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Larahunt\Models\User;

/**
 * This is the user table seeder class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
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
            User::create([
                'id' => $i,
                'email' => $faker->email,
                'username' => $faker->userName,
                'name' => $faker->name,
                'access_token' => Str::random(40)
            ]);
        }
    }
}
