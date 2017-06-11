<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternSupervisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('intern_supervisors', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('first_name');
		    $table->string('middle_name')->nullable();
		    $table->string('last_name');
		    $table->string('prefix');
		    $table->string('email');
		    $table->string('phone');
		    $table->integer('organization_id')->unsigned();
		    $table->foreign('organization_id')->references('id')->on('intern_organizations');
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
	    Schema::dropIfExists('intern_supervisors');
    }
}
