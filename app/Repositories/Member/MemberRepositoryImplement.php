<?php

namespace App\Repositories\Member;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Member;
use Illuminate\Database\Eloquent\Collection;

class MemberRepositoryImplement extends Eloquent implements MemberRepository
{

	/**
	 * Model class to be used in this repository for the common methods inside Eloquent
	 * Don't remove or change $this->model variable name
	 * @property Model|mixed $model;
	 */
	protected $model;

	public function __construct(Member $model)
	{
		$this->model = $model;
	}

	public function all(): Collection
	{
		return $this->model->with(['division', 'generation'])->latest()->get();
	}

	public function findById($id): Member
	{
		return $this->model->findOrFail($id);
	}

	public function create($payload): Member
	{
		return $this->model->create([
			// 'user_id' => $payload['user_id'],
			'generation_id' => $payload['generation_id'],
			'department_id' => $payload['department_id'],
			'division_id' => $payload['division_id'],
			'name' => $payload['name'],
			'nrp' => $payload['nrp'],
			'email' => $payload['email'],
			'phone_number' => $payload['phone_number']
		]);
	}

	public function update($id, $payload): Member
	{
		$member = $this->findById($id);
		$member->update([
			'generation_id' => $payload['generation_id'],
			'department_id' => $payload['department_id'],
			'division_id' => $payload['division_id'],
			'name' => $payload['name'],
			'nrp' => $payload['nrp'],
			'email' => $payload['email'],
			'phone_number' => $payload['phone_number']
		]);
		return $member;
	}

	public function destroy($id): bool
	{
		$member = $this->findById($id);
		return $member->delete();
	}
}
