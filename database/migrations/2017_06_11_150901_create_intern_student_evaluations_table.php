<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternStudentEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
	    // here we assume that the midterm evaluation has the same entries as final evaluation
        // otherwise, we will need a new table/entity for midterm.
		Schema::create('intern_student_evaluations', function (Blueprint $table) {
			$table->increments('id');
            $table->integer('internship_id')->unsigned();
            $table->foreign('internship_id')->references('id')->on('intern_internships');
			$table->text('performance_comment');
			$table->boolean('has_noteworthy');
			$table->text('noteworthy_aspects');
			$table->boolean('need_improve');
			$table->text('student_weakness');
			$table->text('weakness_remedy');
			$table->text('suitability');
			$table->text('job_advice');
			// 5 options are:
			// Outstanding (top 10%)
			// Good (top 25%)
			// Fair (top 50%)
			// Poor (bottom 50%)
			// Unable to compare
			$table->string('performance_rating');
			// 4 options are:
			// Outstanding (top 10%)
			// Good (top 25%)
			// Fair (top 50%)
			// Poor (bottom 50%)
			$table->string('development_rating');
			// to tell if an evaluation is a midterm or a final
			$table->boolean('is_midterm');
			// once the evaluation is submitted, NO ONE can update it anymore.
			$table->boolean('is_submitted');
			$table->date('submitted_at');
			$table->date('sent_at');
			$table->date('midterm_sent_at');
			$table->date('midterm_submitted_at');
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
		Schema::dropIfExists('intern_student_evaluations');
	}
}
