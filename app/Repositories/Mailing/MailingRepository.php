<?php

namespace App\Repositories\Mailing;

use App\Models\Mailing;
use Illuminate\Database\Eloquent\Collection;
use LaravelEasyRepository\Repository;

interface MailingRepository extends Repository
{
	public function all(): Collection;
	public function create($payload): Mailing;
	public function find($id): Mailing;
	public function update($id, $payload): Mailing;
	public function delete($id): bool;
}
