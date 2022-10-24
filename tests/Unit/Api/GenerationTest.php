<?php

namespace Tests\Unit\Api;

use App\Models\Generation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class GenerationTest extends TestCase
{
	use RefreshDatabase;

	protected $collections = [
		'Gen 13',
		'Gen 14',
		'Gen 15',
		'Gen 16',
		'Gen 17'
	];

	public function test_get_all_generations()
	{
		foreach ($this->collections as $collection) {
			$this->postJson('/api/generations', [
				'title' => $collection
			]);
		}

		$response = $this->get('/api/generations');

		$this->assertDatabaseCount('generations', 5) ?
			$response->assertStatus(200) :
			$response->assertStatus(404);
	}

	public function test_create_new_generation()
	{
		$response = $this->postJson('/api/generations', [
			'title' => 'Gen 17'
		]);

		$response
			->assertStatus(201)
			->assertJson([
				'message' => 'Generation created successfully'
			]);
	}

	public function test_get_generation_by_id()
	{
		$ids = [];

		foreach ($this->collections as $collection) {
			$this->postJson('/api/generations', [
				'title' => $collection
			]);
			$ids = Generation::pluck('id')->toArray();
		}

		$response = $this->get('/api/generations/' . $ids[0]);
		$response
			->assertStatus(200)
			->assertJson(
				fn (AssertableJson $json) =>
				$json->where('data.title', 'Gen 13')
					->where('message', 'Generation retrieved successfully')
					->etc()
			);
	}

	public function test_update_generation()
	{
		$generation = $this->postJson('/api/generations', [
			'title' => 'Gen 18'
		]);
		$id = $generation->json('data.id');

		$response = $this->patchJson('/api/generations/' . $id, [
			'title' => 'Gen 17'
		]);

		$response
			->assertStatus(200)
			->assertJson(
				fn (AssertableJson $json) =>
				$json->where('data.title', 'Gen 17')
					->where('message', 'Generation updated successfully')
					->etc()
			);
	}

	public function test_delete_generation()
	{
		$generation = $this->postJson('/api/generations', [
			'title' => 'Gen 16'
		]);
		$id = $generation->json('data.id');

		$response = $this->deleteJson('/api/generations/' . $id);
		$response
			->assertStatus(200)
			->assertJson([
				'message' => 'Generation deleted successfully'
			])
			->assertJsonMissing([
				'id' => $id
			]);
	}
}
