<?php

namespace Database\Seeders;

use App\Models\Generation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenerationSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$generations = ['Gen 14', 'Gen 15', 'Gen 16', 'Gen 17'];
		foreach ($generations as $generation) {
			Generation::create([
				'title' => $generation
			]);
		}
	}
}
