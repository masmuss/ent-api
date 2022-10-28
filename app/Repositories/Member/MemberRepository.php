<?php

namespace App\Repositories\Member;

use App\Models\Member;
use Illuminate\Database\Eloquent\Collection;
use LaravelEasyRepository\Repository;

interface MemberRepository extends Repository
{
	public function all(): Collection;
	public function findById(int $id): Member;
	public function create($payload): Member;
	public function update($id, $payload): Member;
	public function destroy($id): bool;
}
