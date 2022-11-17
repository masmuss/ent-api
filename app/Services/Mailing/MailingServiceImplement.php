<?php

namespace App\Services\Mailing;

use App\Models\Mailing;
use LaravelEasyRepository\Service;
use App\Repositories\Mailing\MailingRepository;
use Illuminate\Database\Eloquent\Collection;

class MailingServiceImplement extends Service implements MailingService
{

	/**
	 * don't change $this->mainRepository variable name
	 * because used in extends service class
	 */
	protected $mainRepository;

	public function __construct(MailingRepository $mainRepository)
	{
		$this->mainRepository = $mainRepository;
	}

	// Define your custom methods :)
	public function getAll(): Collection
	{
		return $this->mainRepository->all();
	}

	public function create($payload): Mailing
	{
		return $this->mainRepository->create($payload);
	}

	public function find($id): Mailing
	{
		return $this->mainRepository->find($id);
	}

	public function update($id, $payload): Mailing
	{
		return $this->mainRepository->update($id, $payload);
	}

	public function delete($id): bool
	{
		return $this->mainRepository->delete($id);
	}
}
