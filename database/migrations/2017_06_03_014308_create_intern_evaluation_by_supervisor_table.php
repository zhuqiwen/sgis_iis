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
		    $table->string('not_approved_reasons');
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
