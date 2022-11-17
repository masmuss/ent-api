<?php

namespace App\Repositories\Finance;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Finance;
use Illuminate\Database\Eloquent\Collection;

class FinanceRepositoryImplement extends Eloquent implements FinanceRepository
{

	/**
	 * Model class to be used in this repository for the common methods inside Eloquent
	 * Don't remove or change $this->model variable name
	 * @property Model|mixed $model;
	 */
	protected $model;

	public function __construct(Finance $model)
	{
		$this->model = $model;
	}

	// Write something awesome :)
	public function all(): Collection
	{
		return $this->model->latest()->get();
	}

	public function getBalance()
	{
		return $this->model->latest()->first()->balance ?? 0;
	}

	public function create($payload): Finance
	{
		$balance = $this->getBalance();
		$result = $this->model->create([
			'date' => $payload['date'],
			'description' => $payload['description'],
			'amount' => $payload['amount'],
			'type' => $payload['type'],
			'balance' => $payload['type'] === 'income' ? $balance + $payload['amount'] : $balance - $payload['amount'],
		]);

		return $result;
	}

	public function update($id, $payload): Finance
	{
		$finance = $this->model->findOrFail($id);
		$balance = $this->getBalance();
		$finance->update([
			'date' => $payload['date'],
			'description' => $payload['description'],
			'amount' => $payload['amount'],
			'type' => $payload['type'],
			'balance' => $payload['type'] === 'income' ? $balance + $payload['amount'] : $balance - $payload['amount'],
		]);

		return $finance;
	}

	public function delete($id): bool
	{
		$finance = $this->model->findOrFail($id);
		$finance->delete();

		return true;
	}
}
