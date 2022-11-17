<?php

namespace App\Services\Generation;

use App\Models\Generation;
use Illuminate\Database\Eloquent\Collection;
use LaravelEasyRepository\BaseService;

interface GenerationService extends BaseService
{
	public function all(): Collection;
	public function findById(int $id): Generation;
	public function create($payload): Generation;
	public function update($id, $payload): Generation;
	public function destroy($id): bool;
}
