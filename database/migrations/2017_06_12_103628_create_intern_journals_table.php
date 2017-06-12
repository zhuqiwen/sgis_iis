<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('intern_journals', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('application_id')->unsigned();
			$table->foreign('application_id')->references('id')->on('intern_applications');
			$table->text('journal');
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
		Schema::dropIfExists('intern_journals');
	}
}
