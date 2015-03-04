<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Larahunt\Models\Tag;

class TagTableSeeder extends Seeder {

	/**
	 * Seed the database.
	 */
	public function run()
	{
		$faker = Faker::create();

		DB::table('tags')->delete();

		foreach(range(1, 10) as $i)
		{
			Tag::create([
				'title' => $faker->streetSuffix,
			]);
		}
	}

}
