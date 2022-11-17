<?php

namespace App\Services\Division;

use App\Models\Division;
use App\Repositories\Division\DivisionRepository;
use Illuminate\Database\Eloquent\Collection;
use LaravelEasyRepository\ServiceApi;

class DivisionServiceImplement extends ServiceApi implements DivisionService
{

	/**
	 * don't change $this->mainRepository variable name
	 * because used in extends service class
	 */
	protected $mainRepository;

	public function __construct(DivisionRepository $mainRepository)
	{
		$this->mainRepository = $mainRepository;
	}

	public function all(): Collection
	{
		return $this->mainRepository->all();
	}

	public function findById(int $id): Division
	{
		return $this->mainRepository->findById($id);
	}

	public function create($payload): Division
	{
		return $this->mainRepository->create($payload);
	}

	public function update($id, $payload): Division
	{
		return $this->mainRepository->update($id, $payload);
	}

	public function destroy($id): bool
	{
		return $this->mainRepository->destroy($id);
	}
}
