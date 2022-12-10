<?php

namespace App\Services\Finance;

use App\Models\Finance;
use LaravelEasyRepository\Service;
use App\Repositories\Finance\FinanceRepository;
use Illuminate\Database\Eloquent\Collection;

class FinanceServiceImplement extends Service implements FinanceService
{

	/**
	 * don't change $this->mainRepository variable name
	 * because used in extends service class
	 */
	protected $mainRepository;

	public function __construct(FinanceRepository $mainRepository)
	{
		$this->mainRepository = $mainRepository;
	}

	// Define your custom methods :)
	public function getAll(): Collection
	{
		return $this->mainRepository->all();
	}

	public function getReport($month, $year): Collection
	{
		return $this->mainRepository->getReport($month, $year);
	}

	public function create($payload): Finance
	{
		return $this->mainRepository->create($payload);
	}

	public function update($id, $payload): Finance
	{
		return $this->mainRepository->update($id, $payload);
	}

	public function delete($id): bool
	{
		return $this->mainRepository->delete($id);
	}
}
