<?php

namespace App\Services\Department;

use App\Models\Department;
use Illuminate\Database\Eloquent\Collection;
use LaravelEasyRepository\BaseService;

interface DepartmentService extends BaseService
{
	public function all(): Collection;
	public function findById(int $id): Department;
	public function create($payload): Department;
	public function update($id, $payload): Department;
	public function destroy($id): bool;
}
