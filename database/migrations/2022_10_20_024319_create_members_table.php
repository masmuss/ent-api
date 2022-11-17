<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('members', function (Blueprint $table) {
			$table->uuid('id')->primary();
			// $table->unsignedBigInteger('user_id');
			$table->unsignedBigInteger('generation_id');
			$table->unsignedBigInteger('department_id');
			$table->unsignedBigInteger('division_id');
			$table->string('name');
			$table->string('nrp');
			$table->string('email')->nullable();
			$table->string('phone_number');
			$table->timestamps();

			// $table->foreign('user_id')->references('id')->on('users');
			$table->foreign('generation_id')->references('id')->on('generations');
			$table->foreign('department_id')->references('id')->on('departments');
			$table->foreign('division_id')->references('id')->on('divisions');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('members');
	}
};
