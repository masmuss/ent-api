<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Log extends Model
{
	use HasFactory, SoftDeletes;

	protected $fillable = [
		'ip',
		'method',
		'uri',
		'user_agent',
		'duration',
		'status_code',
	];
}
