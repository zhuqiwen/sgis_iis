<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternInternshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('intern_internships', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('application_id')->unsigned();
			$table->foreign('application_id')->references('id')->on('intern_applications');
			$table->text('application_notes')->nullable()->default(null);
			$table->text('final_notes')->nullable()->default(null);
			$table->tinyInteger('x373_hours')->nullable()->default(null);
			$table->string('x373_grade')->nullable()->default(null);
			$table->boolean('case_closed')->nullable()->default(null);
			$table->integer('closed_by')->unsigned()->nullable()->default(null);
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
		Schema::dropIfExists('intern_internships');
	}
}
