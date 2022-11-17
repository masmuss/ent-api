<?php

namespace Tests\Unit\Api;

use App\Models\Department;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class DepartmentTest extends TestCase
{
	use RefreshDatabase;

	public function test_get_all_departments()
	{
		$collections = ['D3', 'D4'];
		foreach ($collections as $collection) {
			$this->postJson('/api/departments', [
				'level' => $collection
			]);
		}

		$response = $this->get('/api/departments');
		$this->assertDatabaseCount(
			'departments',
			2
		) ?
			$response->assertStatus(200) :
			$response->assertStatus(404);
	}

	public function test_create_new_department()
	{
		$response = $this->postJson('/api/departments', [
			'level' => 'D4'
		]);
		$response
			->assertStatus(201)
			->assertJson(
				fn (AssertableJson $json) =>
				$json->where('data.level', 'D4')
					->etc()
			);
	}

	public function test_get_department_by_id()
	{
		$collections = ['D3', 'D4'];
		$ids = [];

		foreach ($collections as $collection) {
			$this->postJson('/api/departments', [
				'level' => $collection
			]);
			$ids = Department::pluck('id')->toArray();
		}

		$response = $this->get('/api/departments/' . $ids[0]);
		$response
			->assertStatus(200)
			->assertJson(
				fn (AssertableJson $json) =>
				$json->where('data.level', 'D3')
					->where('message', 'Department retrieved successfully')
					->etc()
			);
	}

	public function test_update_department()
	{
		$data = $this->postJson('/api/departments', [
			'level' => 'D4'
		]);
		$id = $data->json('data.id');

		$response = $this->patchJson('/api/departments/' . $id, [
			'level' => 'D3'
		]);
		$response
			->assertStatus(200)
			->assertJson(
				fn (AssertableJson $json) =>
				$json->where('data.level', 'D3')
					->where('message', 'Department updated successfully')
					->etc()
			);
	}

	public function test_delete_department()
	{
		$data = $this->postJson('/api/departments', [
			'level' => 'D3'
		]);
		$id = $data->json('data.id');

		$response = $this->deleteJson('/api/departments/' . $id);
		$response
			->assertStatus(200)
			->assertJson([
				'message' => 'Department deleted successfully'
			])
			->assertJsonMissing([
				'id' => $id
			]);
	}
}
