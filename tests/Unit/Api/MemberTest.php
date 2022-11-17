<?php

namespace Tests\Unit\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Faker\Factory as Faker;
use Illuminate\Foundation\Testing\RefreshDatabaseState;
use Illuminate\Testing\Fluent\AssertableJson;

class MemberTest extends TestCase
{
	use RefreshDatabase;

	// public function test_get_all_member()
	// {
	// 	// $this->artisan('migrate:fresh', $this->migrateFreshUsing());
	// 	$this->artisan('db:seed');

	// 	// create member

	// 	$response = $this->get('/api/members');

	// 	// $this->assertDatabaseCount('members', 1) ?
	// 	// 	$response
	// 	// 	->assertStatus(200)
	// 	// 	->assertJsonStructure([
	// 	// 		'data' => [
	// 	// 			'*' => [
	// 	// 				'id',
	// 	// 				'user_id',
	// 	// 				'generation_id',
	// 	// 				'department_id',
	// 	// 				'division_id',
	// 	// 				'name',
	// 	// 				'nrp',
	// 	// 				'email',
	// 	// 				'phone_number',
	// 	// 				'created_at',
	// 	// 				'updated_at'
	// 	// 			]
	// 	// 		]
	// 	// 	]) :
	// 	// 	$this->assertTrue(false);
	// }

	public function test_create_member()
	{
		$this->artisan('migrate:fresh', $this->migrateFreshUsing());
		$this->artisan('db:seed');

		$user = User::find(1);
		$faker = Faker::create();

		$response = $this->post('/api/members', [
			'user_id' => $user->id,
			'generation_id' => rand(1, 4),
			'department_id' => rand(1, 2),
			'division_id' => rand(1, 5),
			'name' => $user->name,
			'nrp' => (string)$faker->numberBetween(1000000000, 9999999999),
			'email' => $user->email,
			'phone_number' => $faker->unique()->phoneNumber
		]);

		$response
			->assertStatus(201)
			->assertJson(
				fn (AssertableJson $json) =>
				$json->where("message", "Member created successfully")
			);
	}
}
