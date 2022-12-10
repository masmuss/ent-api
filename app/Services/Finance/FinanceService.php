<?php

namespace App\Services\Finance;

use App\Models\Finance;
use Illuminate\Database\Eloquent\Collection;
use LaravelEasyRepository\BaseService;

interface FinanceService extends BaseService
{
	public function getAll(): Collection;
	public function getReport(int $month, int $year): Collection;
	public function create($payload): Finance;
	public function update($id, $payload): Finance;
	public function delete($id): bool;
}
