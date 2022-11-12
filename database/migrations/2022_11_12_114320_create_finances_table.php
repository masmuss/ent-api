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
		Schema::create('finances', function (Blueprint $table) {
			$table->uuid('id')->primary();
			$table->date('date');
			$table->string('description');
			$table->bigInteger('amount');
			$table->enum('type', ['income', 'expense']);
			$table->bigInteger('balance');
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
		Schema::dropIfExists('finances');
	}
};
