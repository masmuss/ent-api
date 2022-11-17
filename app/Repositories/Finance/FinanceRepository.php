<?php

namespace App\Repositories\Finance;

use App\Models\Finance;
use Illuminate\Database\Eloquent\Collection;
use LaravelEasyRepository\Repository;

interface FinanceRepository extends Repository
{
	public function all(): Collection;
	public function getBalance();
	public function create($payload) : Finance;
	public function update($id, $payload) : Finance;
	public function delete($id) : bool;
}
