<?php

namespace App\Repositories\Division;

use App\Models\Division;
use Illuminate\Database\Eloquent\Collection;
use LaravelEasyRepository\Repository;

interface DivisionRepository extends Repository
{
	public function all(): Collection;
	public function findById(int $id): Division;
	public function create($payload): Division;
	public function update($id, $payload): Division;
	public function destroy($id): bool;
}
