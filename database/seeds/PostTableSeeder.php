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
use Larahunt\Models\Post;

/**
 * This is the post table seeder class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class PostTableSeeder extends Seeder
{
    /**
     * Seed the database.
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('posts')->delete();

        foreach (range(1, 100) as $i) {
            $date = $faker->dateTimeThisMonth()->format('Y-m-d H:i:s');

            $post = Post::create([
                'url' => $faker->url,
                'title' => ucwords($faker->word(rand(3, 5))),
                'description' => $faker->paragraph(1),
                'published' => true,
                'created_at' => $date,
                'updated_at' => $date,
                'published_at' => $date,
                'user_id' => rand(1, 10),
            ]);

            foreach (range(1, rand(2, 5)) as $id) {
                $post->tags()->attach($id);
            }
        }
    }
}
