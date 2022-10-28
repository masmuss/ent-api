<?php

namespace App\Services\Member;

use App\Models\Member;
use Illuminate\Database\Eloquent\Collection;
use LaravelEasyRepository\BaseService;

interface MemberService extends BaseService
{
	public function all(): Collection;
	public function findById(int $id): Member;
	public function create($payload): Member;
	public function update($id, $payload): Member;
	public function destroy($id): bool;
}
