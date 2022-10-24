<?php

namespace App\Repositories\Division;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Division;
use Illuminate\Database\Eloquent\Collection;

class DivisionRepositoryImplement extends Eloquent implements DivisionRepository
{

	/**
	 * Model class to be used in this repository for the common methods inside Eloquent
	 * Don't remove or change $this->model variable name
	 * @property Model|mixed $model;
	 */
	protected $model;

	public function __construct(Division $model)
	{
		$this->model = $model;
	}

	public function all(): Collection
	{
		return $this->model->all();
	}

	public function findById(int $id): Division
	{
		return $this->model->findOrFail($id);
	}

	public function create($payload): Division
	{
		return $this->model->create([
			'title' => $payload['title']
		]);
	}

	public function update($id, $payload): Division
	{
		$division = $this->findById($id);
		$division->update([
			'title' => $payload['title']
		]);
		return $division;
	}

	public function destroy($id): bool
	{
		$division = $this->findById($id);
		return $division->delete();
	}
}
