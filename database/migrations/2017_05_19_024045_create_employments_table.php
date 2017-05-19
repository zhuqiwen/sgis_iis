<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmploymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('employments', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('job_title');
		    $table->string('country')->nullable();
		    $table->string('state')->nullable();
		    $table->string('city')->nullable();
		    $table->integer('contact_id')->unsigned();
		    $table->integer('employer_id')->unsigned();
		    $table->foreign('contact_id')->references('id')->on('contacts');
		    $table->foreign('employer_id')->references('id')->on('employers');
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
	    Schema::dropIfExists('employments');

    }
}
