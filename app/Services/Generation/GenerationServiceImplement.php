<?php

namespace App\Services\Generation;

use App\Models\Generation;
use App\Repositories\Generation\GenerationRepository;
use Illuminate\Database\Eloquent\Collection;
use LaravelEasyRepository\ServiceApi;

class GenerationServiceImplement extends ServiceApi implements GenerationService
{

	/**
	 * don't change $this->mainRepository variable name
	 * because used in extends service class
	 */
	protected $mainRepository;

	public function __construct(GenerationRepository $mainRepository)
	{
		$this->mainRepository = $mainRepository;
	}

	public function all(): Collection
	{
		return $this->mainRepository->all();
	}

	public function findById(int $id): Generation
	{
		return $this->mainRepository->findById($id);
	}

	public function create($payload): Generation
	{
		return $this->mainRepository->create($payload);
	}

	public function update($id, $payload): Generation
	{
		return $this->mainRepository->update($id, $payload);
	}

	public function destroy($id): bool
	{
		return $this->mainRepository->destroy($id);
	}
}
