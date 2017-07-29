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
            $table->integer('internship_id')->unsigned();
            $table->foreign('internship_id')->references('id')->on('intern_internships');
			$table->text('journal')->nullable()->default(null);

			$table->smallInteger('serial_num')->nullable()->default(null);
			$table->smallInteger('required_total_num')->nullable()->default(null);

            $table->date('due_date')->nullable()->default(null);
            $table->date('submitted_at')->nullable()->default(null);
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
