<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		return $this->call([
			DepartmentSeeder::class,
			GenerationSeeder::class,
			DivisionSeeder::class,
			MemberSeeder::class,
			UserSeeder::class,
			FinanceSeeder::class,
			MailingSeeder::class,
		]);
	}
}
