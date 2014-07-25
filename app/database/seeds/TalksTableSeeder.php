<?php

use Faker\Factory as Faker;


class TalksTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
        $users = User::lists('id');

		foreach(range(1, 500) as $index)
		{
			Talk::create([
                'message' => $faker->sentence(),
                'user_id' => $faker->randomElement($users)
			]);
		}
	}

}