<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternEvaluationBySupervisorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
	    Schema::create('intern_evaluation_by_supervisor', function (Blueprint $table) {
		    $table->increments('id');
		    $table->integer('internship_id')->unsigned();
		    $table->foreign('internship_id')->references('id')->on('internships');
		    $table->string('supervisor_first_name');
		    $table->string('supervisor_middle_name');
		    $table->string('supervisor_last_name');
		    $table->string('supervisor_prefix');
		    $table->string('supervisor_email');
		    $table->string('supervisor_phone');
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
        //
    }
}
