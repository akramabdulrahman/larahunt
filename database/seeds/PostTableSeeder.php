<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Larahunt\Models\Post;

class PostTableSeeder extends Seeder {

	/**
	 * Seed the database.
	 */
	public function run()
	{
		$faker = Faker::create();

		DB::table('posts')->delete();

		foreach(range(1, 100) as $i)
		{
			$date = $faker->dateTimeThisMonth()->format('Y-m-d H:i:s');

			$post = Post::create([
				'url' => $faker->url,
				'title' => ucwords($faker->word(rand(3, 5))),
				'content' => $faker->paragraph(1),
				'created_at' => $date,
				'updated_at' => $date,
				'published_at' => $date,
				'user_id' => rand(1, 10),
			]);

			foreach (range(1, rand(2, 5)) as $id)
			{
				$post->tags()->attach($id);
			}
		}
	}

}
