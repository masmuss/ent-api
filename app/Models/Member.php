<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
	use HasFactory, HasUuids;

	protected $fillable = [
		'user_id',
		'generation_id',
		'department_id',
		'division_id',
		'name',
		'nrp',
		'email',
		'phone_number',
	];
}
