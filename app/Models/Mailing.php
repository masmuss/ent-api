<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mailing extends Model
{
	use HasFactory, HasUuids, SoftDeletes;

	protected $fillable = [
		'location',
		'date',
		'reference_number',
		'attachment',
		'subject',
		'receiver',
		'receiver_address',
		'body',
		'sender_position',
		'sender_name',
		'sender_id_type',
		'sender_id',
	];
}
