<?php

namespace App\Services\Department;

use App\Models\Department;
use LaravelEasyRepository\ServiceApi;
use App\Repositories\Department\DepartmentRepository;
use Illuminate\Database\Eloquent\Collection;

class DepartmentServiceImplement extends ServiceApi implements DepartmentService
{

	/**
	 * don't change $this->mainRepository variable name
	 * because used in extends service class
	 */
	protected $mainRepository;

	public function __construct(DepartmentRepository $mainRepository)
	{
		$this->mainRepository = $mainRepository;
	}

	public function all(): Collection
	{
		return $this->mainRepository->all();
	}

	public function findById(int $id): Department
	{
		return $this->mainRepository->findById($id);
	}

	public function create($payload): Department
	{
		return $this->mainRepository->create($payload);
	}

	public function update($id, $payload): Department
	{
		return $this->mainRepository->update($id, $payload);
	}

	public function destroy($id): bool
	{
		return $this->mainRepository->destroy($id);
	}
}
