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
            $table->integer('internship_id')->unsigned();
            $table->foreign('internship_id')->references('id')->on('intern_internships');
            $table->text('reflection');
            $table->date('due_date')->nullable()->default(null);
            $table->boolean('is_submitted')->nullable()->default(null);
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
