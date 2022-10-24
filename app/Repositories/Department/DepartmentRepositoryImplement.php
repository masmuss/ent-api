<?php

namespace App\Repositories\Department;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Department;
use Illuminate\Database\Eloquent\Collection;

class DepartmentRepositoryImplement extends Eloquent implements DepartmentRepository
{
	/**
	 * Model class to be used in this repository for the common methods inside Eloquent
	 * Don't remove or change $this->model variable name
	 * @property Model|mixed $model;
	 */
	protected $model;

	public function __construct(Department $model)
	{
		$this->model = $model;
	}

	public function all(): Collection
	{
		return $this->model->all();
	}

	public function findById(int $id): Department
	{
		return $this->model->findOrFail($id);
	}

	public function create($payload): Department
	{
		return $this->model->create([
			'level' => $payload['level']
		]);
	}

	public function update($id, $payload): Department
	{
		$department = $this->findById($id);
		$department->update([
			'level' => $payload['level']
		]);
		return $department;
	}

	public function destroy($id): bool
	{
		$department = $this->findById($id);
		return $department->delete();
	}
}
