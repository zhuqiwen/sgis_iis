<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternReflectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('intern_reflections', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('application_id')->unsigned();
			$table->foreign('application_id')->references('id')->on('intern_applications');
			$table->text('reflection');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('intern_reflections');
	}
}
