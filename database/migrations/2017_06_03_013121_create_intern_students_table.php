<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
	    Schema::create('intern_students', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('first_name');
		    $table->string('middle_name')->nullable();
		    $table->string('last_name');
		    $table->string('iu_username');
		    $table->string('iuid');

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
