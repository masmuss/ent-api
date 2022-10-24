<?php

namespace App\Repositories\Department;

use App\Models\Department;
use Illuminate\Database\Eloquent\Collection;
use LaravelEasyRepository\Repository;

interface DepartmentRepository extends Repository
{
	public function all(): Collection;
	public function findById(int $id): Department;
	public function create($payload): Department;
	public function update($id, $payload): Department;
	public function destroy($id): bool;
}
