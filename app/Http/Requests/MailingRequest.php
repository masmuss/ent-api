<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailingRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules()
	{
		return [
			'location' => 'required|string',
			'date' => 'required|date',
			'reference_number' => 'required|string',
			'attachment' => 'required|string',
			'subject' => 'required|string',
			'receiver' => 'required|string',
			'receiver_address' => 'required|string',
			'body' => 'required|string',
			'sender_position' => 'required|string',
			'sender_name' => 'required|string',
			'sender_id_type' => 'required|string',
			'sender_id' => 'required|string',
		];
	}
}
