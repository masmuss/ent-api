<?php

namespace App\Repositories\Mailing;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Mailing;
use Illuminate\Database\Eloquent\Collection;

class MailingRepositoryImplement extends Eloquent implements MailingRepository
{

	/**
	 * Model class to be used in this repository for the common methods inside Eloquent
	 * Don't remove or change $this->model variable name
	 * @property Model|mixed $model;
	 */
	protected $model;

	public function __construct(Mailing $model)
	{
		$this->model = $model;
	}

	// Write something awesome :)
	public function all(): Collection
	{
		return $this->model->latest()->get();
	}

	public function create($payload): Mailing
	{
		$result = $this->model->create([
			'location' => $payload['location'],
			'date' => $payload['date'],
			'reference_number' => $payload['reference_number'],
			'attachment' => $payload['attachment'],
			'subject' => $payload['subject'],
			'receiver' => $payload['receiver'],
			'receiver_address' => $payload['receiver_address'],
			'body' => $payload['body'],
			'sender_position' => $payload['sender_position'],
			'sender_name' => $payload['sender_name'],
			'sender_id_type' => $payload['sender_id_type'],
			'sender_id' => $payload['sender_id'],
		]);

		return $result;
	}

	public function find($id): Mailing
	{
		return $this->model->findOrFail($id);
	}

	public function update($id, $payload): Mailing
	{
		$mailing = $this->model->findOrFail($id);
		$mailing->update([
			'location' => $payload['location'],
			'date' => $payload['date'],
			'reference_number' => $payload['reference_number'],
			'attachment' => $payload['attachment'],
			'subject' => $payload['subject'],
			'receiver' => $payload['receiver'],
			'receiver_address' => $payload['receiver_address'],
			'body' => $payload['body'],
			'sender_position' => $payload['sender_position'],
			'sender_name' => $payload['sender_name'],
			'sender_id_type' => $payload['sender_id_type'],
			'sender_id' => $payload['sender_id'],
		]);

		return $mailing;
	}

	public function delete($id): bool
	{
		$mailing = $this->model->findOrFail($id);
		$mailing->delete();

		return true;
	}
}
