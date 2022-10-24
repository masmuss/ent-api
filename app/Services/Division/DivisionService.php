<?php

namespace App\Services\Division;

use App\Models\Division;
use Illuminate\Database\Eloquent\Collection;
use LaravelEasyRepository\BaseService;

interface DivisionService extends BaseService
{
	public function all(): Collection;
	public function findById(int $id): Division;
	public function create($payload): Division;
	public function update($id, $payload): Division;
	public function destroy($id): bool;
}
