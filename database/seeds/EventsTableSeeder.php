<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class EventsTableSeeder extends Seeder {
	public function run() {
		DB::table('events')->truncate();
		DB::table('category_event')->truncate();

		$faker = Faker::create();
		for($i=1; $i<=15; $i++) {
			$event = new App\Event();
			$event->name = $faker->sentence(6, true);
			$event->content = $faker->text(400);
			$event->visible_at = $faker->date($format = 'Y-m-d', $max = 'now');

			$event->save();

			$categories = App\Category::all();

			for($j=1; $j<=mt_rand(0, App\Category::count()); $j++) {
				$category = App\Category::find($j);
				$event->categories()->save($category);
			}

		}
	}
}
