<?php

namespace App\Services\Mailing;

use App\Models\Mailing;
use Illuminate\Database\Eloquent\Collection;
use LaravelEasyRepository\BaseService;

interface MailingService extends BaseService
{
	public function getAll(): Collection;
	public function create($payload): Mailing;
	public function find($id): Mailing;
	public function update($id, $payload): Mailing;
	public function delete($id): bool;
}
