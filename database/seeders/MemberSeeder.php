<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		for ($i = 0; $i < 50; $i++) {
			Member::create([
				'generation_id' => rand(1, 4),
				'department_id' => rand(1, 2),
				'division_id' => rand(1, 5),
				'name' => fake()->name,
				'nrp' => fake()->unique()->numberBetween(1000000000, 9999999999),
				'email' => fake()->unique()->email,
				'phone_number' => fake()->unique()->phoneNumber,
				'created_at' => fake()->dateTimeBetween('-5 years', 'now'),
			]);
		}
	}
}
