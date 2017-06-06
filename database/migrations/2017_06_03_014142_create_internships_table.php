<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
	    Schema::create('internships', function (Blueprint $table) {
		    $table->increments('id');
		    $table->integer('student_id')->unsigned();
		    $table->foreign('student_id')->references('id')->on('intern_students');
		    $table->integer('supervisor_id')->unsigned();
		    $table->foreign('supervisor_id')->references('id')->on('intern_supervisors');
			$table->integer('organization_id')->unsigned();
		    $table->foreign('organization_id')->references('id')->on('intern_organizations');

		    $table->string('country');
		    $table->string('state');
		    $table->string('city');
		    $table->string('organization');
		    $table->string('organization_type');
		    $table->string('organization_url');
		    $table->string('term');
		    $table->boolean('has_location_warning');

		    $table->date('start_date');
		    $table->date('end_date');
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
