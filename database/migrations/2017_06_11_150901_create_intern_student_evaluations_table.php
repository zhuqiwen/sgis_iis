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
			$table->text('performance_comment')->nullable()->default(null);
			$table->boolean('has_noteworthy')->nullable()->default(null);
			$table->text('noteworthy_aspects')->nullable()->default(null);
			$table->boolean('need_improve')->nullable()->default(null);
			$table->text('student_weakness')->nullable()->default(null);
			$table->text('weakness_remedy')->nullable()->default(null);
			$table->text('suitability')->nullable()->default(null);
			$table->text('job_advice')->nullable()->default(null);
			// 5 options are:
			// Outstanding (top 10%)
			// Good (top 25%)
			// Fair (top 50%)
			// Poor (bottom 50%)
			// Unable to compare
			$table->string('performance_rating')->nullable()->default(null);
			// 4 options are:
			// Outstanding (top 10%)
			// Good (top 25%)
			// Fair (top 50%)
			// Poor (bottom 50%)
			$table->string('development_rating')->nullable()->default(null);
			// to tell if an evaluation is a midterm or a final
			$table->boolean('is_midterm')->default(0);
			// once the evaluation is submitted, NO ONE can update it anymore.
            $table->date('due_date')->nullable()->default(null);
			$table->date('submitted_at')->nullable()->default(null);
			$table->date('sent_at')->nullable()->default(null);
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
