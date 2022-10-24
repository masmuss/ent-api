<?php

namespace Tests\Unit\Api;

use App\Models\Division;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class DivisionTest extends TestCase
{
	use RefreshDatabase;

	protected $collections = [
		'Reporter',
		'Videographer',
		'Graphic Designer',
		'Photographer',
		'Webmaster'
	];

	/**
	 * A basic feature test example.
	 *
	 * @return void
	 */
	public function test_get_all_divisions()
	{
		foreach ($this->collections as $collection) {
			$this->postJson('/api/divisions', [
				'title' => $collection
			]);
		}

		$response = $this->get('/api/divisions');

		$response
			->assertJsonCount(5, 'data');
	}

	public function test_create_new_division()
	{
		$response = $this->postJson('/api/divisions', [
			'title' => 'Reporter'
		]);

		$response
			->assertStatus(201)
			->assertJson([
				'message' => 'Division created successfully'
			]);
	}

	public function test_get_division_by_id()
	{
		$ids = [];
		foreach ($this->collections as $collection) {
			$this->postJson('/api/divisions', [
				'title' => $collection
			]);
			$ids = Division::pluck('id')->toArray();
		}

		$response = $this->get('/api/divisions/' . $ids[0]);
		$response
			->assertStatus(200)
			->assertJson(
				fn (AssertableJson $json) =>
				$json->where('data.title', 'Reporter')
					->where('message', 'Division retrieved successfully')
					->etc()
			);
	}

	public function test_update_division()
	{
		$division = $this->postJson('/api/divisions', [
			'title' => 'Reporter'
		]);
		$id = $division->json('data.id');

		$response = $this->putJson('/api/divisions/' . $id, [
			'title' => 'Videographer'
		]);

		$response
			->assertStatus(200)
			->assertJson(
				fn (AssertableJson $json) =>
				$json->where('data.title', 'Videographer')
					->where('message', 'Division updated successfully')
					->etc()
			);
	}

	public function test_delete_division()
	{
		$division = $this->postJson('/api/divisions', [
			'title' => 'Reporter'
		]);
		$id = $division->json('data.id');

		$response = $this->deleteJson('/api/divisions/' . $id);

		$response
			->assertStatus(200)
			->assertJson([
				'message' => 'Division deleted successfully'
			])
			->assertJsonMissing([
				'id' => $id
			]);
	}
}
