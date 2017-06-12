<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternSiteEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('intern_site_evaluations', function (Blueprint $table) {
		    $table->increments('id');
		    $table->integer('application_id')->unsigned();
		    $table->foreign('application_id')->references('id')->on('intern_applications');
		    $table->text('how_did_locate');
		    $table->text('site_description');
		    $table->text('task_description');
		    $table->text('fit_into_study');
		    $table->text('site_strength');
		    $table->text('site_weakness');
		    $table->text('gained_skills');
		    // the scale is 0-9
		    $table->integer('willing_to_recommend');
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
        Schema::dropIfExists('intern_site_evaluations');
    }
}
