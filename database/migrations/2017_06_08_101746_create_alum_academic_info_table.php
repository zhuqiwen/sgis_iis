<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumAcademicInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('alum_academic_info', function(Blueprint $table){
		    $table->increments('id');
		    $table->date('class-year')->nullable()->default(NULL);
		    $table->string('degree')->nullable()->default(NULL);
		    $table->integer('contact_id')->unsigned();
		    $table->integer('field_id')->unsigned();
		    $table->foreign('contact_id')->references('id')->on('alum_contacts');
		    $table->foreign('field_id')->references('id')->on('alum_study_fields');
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
	    Schema::dropIfExists('alum_academic_info');

    }
}
