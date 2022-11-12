<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$divisions = [
			'Reporter',
			'Videographer',
			'Graphic Designer',
			'Photographer',
			'Webmaster'
		];

		foreach ($divisions as $division) {
			Division::create([
				'title' => $division,
				'created_at' => fake()->dateTimeBetween('-5 years', 'now'),
			]);
		}
	}
}
