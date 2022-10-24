<?php

namespace App\Repositories\Generation;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Generation;
use Illuminate\Database\Eloquent\Collection;

class GenerationRepositoryImplement extends Eloquent implements GenerationRepository
{

	/**
	 * Model class to be used in this repository for the common methods inside Eloquent
	 * Don't remove or change $this->model variable name
	 * @property Model|mixed $model;
	 */
	protected $model;

	public function __construct(Generation $model)
	{
		$this->model = $model;
	}

	public function all(): Collection
	{
		return $this->model->all();
	}

	public function findById(int $id): Generation
	{
		return $this->model->findOrFail($id);
	}

	public function create($payload): Generation
	{
		return $this->model->create([
			'title' => $payload['title']
		]);
	}

	public function update($id, $payload): Generation
	{
		$generation = $this->findById($id);
		$generation->update([
			'title' => $payload['title']
		]);

		return $generation;
	}

	public function destroy($id): bool
	{
		$generation = $this->findById($id);
		return $generation->delete();
	}
}
