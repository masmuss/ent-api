<?php

namespace Database\Seeders;

use App\Models\Finance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FinanceSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = \Faker\Factory::create();

		for ($i = 0; $i < 10; $i++) {
			$date = now()->subDays($i);
			$amount = $faker->numberBetween(10000, 1000000);
			$type = rand(0, 1) ? 'income' : 'expense';

			$balance = Finance::latest()->first()->balance ?? 0;
			$balance = $type === 'income' ? $balance + $amount : $balance - $amount;

			Finance::create([
				'date' => $date,
				'description' => $faker->sentence(4),
				'amount' => $amount,
				'type' => $type,
				'balance' => $balance,
			]);
		}
	}
}
