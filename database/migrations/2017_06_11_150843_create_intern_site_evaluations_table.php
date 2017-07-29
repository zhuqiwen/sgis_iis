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
		    $table->integer('internship_id')->unsigned();
		    $table->foreign('internship_id')->references('id')->on('intern_internships');
		    $table->text('how_did_locate')->nullable()->default(null);
		    $table->text('site_description')->nullable()->default(null);
		    $table->text('task_description')->nullable()->default(null);
		    $table->text('fit_into_study')->nullable()->default(null);
		    $table->text('site_strength')->nullable()->default(null);
		    $table->text('site_weakness')->nullable()->default(null);
		    $table->text('gained_skills')->nullable()->default(null);
		    $table->text('brief_comment')->nullable()->default(null);
		    // the scale is 0-9
		    $table->tinyInteger('willing_to_recommend')->nullable()->default(null);
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
        Schema::dropIfExists('intern_site_evaluations');
    }
}
