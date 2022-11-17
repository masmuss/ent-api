<?php

namespace App\Repositories\Generation;

use App\Models\Generation;
use Illuminate\Database\Eloquent\Collection;
use LaravelEasyRepository\Repository;

interface GenerationRepository extends Repository
{
	public function all(): Collection;
	public function findById(int $id): Generation;
	public function create($payload): Generation;
	public function update($id, $payload): Generation;
	public function destroy($id): bool;
}
