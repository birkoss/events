<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class EventsTableSeeder extends Seeder {
	public function run() {
		DB::table('events')->truncate();

		$faker = Faker::create();
		for($i=1; $i<=15; $i++) {
			$event = new App\Event();
			$event->name = $faker->sentence(6, true);
			$event->content = $faker->text(400);
			$event->visible_at = $faker->date($format = 'Y-m-d', $max = 'now');
			$event->save();
		}
	}
}
