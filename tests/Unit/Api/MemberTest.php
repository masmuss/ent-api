<?php

namespace Tests\Unit\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MemberTest extends TestCase
{
	use RefreshDatabase;

	public function test_get_all_member()
	{
		$this->seed('DatabaseSeeder');

		foreach (User::all() as $user) {
			$this->actingAs($user);
			$this->postJson('/api/members', [
				'generation_id' => rand(1, 3),
				'department_id' => rand(1, 2),
				'division_id' => rand(1, 5),
				'name' => $user->name,
				'nrp' => '1234567890',
				'email' => $user->email,
				'phone_number' => '081234567890'
			]);
		}

		// get all member
		$response = $this->getJson('/api/members');
		$response
			->assertStatus(200)
			->assertJsonCount(10, 'data');
	}
}
