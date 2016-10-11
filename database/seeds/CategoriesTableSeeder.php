<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder {
	public function run() {
		DB::table('categories')->truncate();

		$faker = Faker::create();
		for($i=1; $i<=3; $i++) {
			$category = new App\Category();
			$category->name = $faker->catchPhrase;
			$category->save();
		}
	}
}
