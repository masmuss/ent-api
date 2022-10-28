<?php

namespace App\Services\Member;

use App\Models\Member;
use LaravelEasyRepository\Service;
use App\Repositories\Member\MemberRepository;
use Illuminate\Database\Eloquent\Collection;
use LaravelEasyRepository\ServiceApi;

class MemberServiceImplement extends ServiceApi implements MemberService
{

	/**
	 * don't change $this->mainRepository variable name
	 * because used in extends service class
	 */
	protected $mainRepository;

	public function __construct(MemberRepository $mainRepository)
	{
		$this->mainRepository = $mainRepository;
	}

	public function all(): Collection
	{
		return $this->mainRepository->all();
	}

	public function findById($id): Member
	{
		return $this->mainRepository->findById($id);
	}

	public function create($payload): Member
	{
		return $this->mainRepository->create($payload);
	}

	public function update($id, $payload): Member
	{
		return $this->mainRepository->update($id, $payload);
	}

	public function destroy($id): bool
	{
		return $this->mainRepository->destroy($id);
	}
}
