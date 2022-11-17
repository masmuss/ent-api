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
		Schema::create('mailings', function (Blueprint $table) {
			$table->uuid('id')->primary();
			$table->string('location');
			$table->string('date');
			$table->string('reference_number');
			$table->string('attachment');
			$table->string('subject');
			$table->string('receiver');
			$table->string('receiver_address');
			$table->text('body');
			$table->string('sender_position');
			$table->string('sender_name');
			$table->string('sender_id_type');
			$table->string('sender_id');
			$table->softDeletes();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('mailings');
	}
};
