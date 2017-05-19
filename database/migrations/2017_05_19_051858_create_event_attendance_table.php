<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('event_attendance', function(Blueprint $table){
		    $table->increments('id');
		    $table->integer('contact_id')->unsigned();
		    $table->integer('event_id')->unsigned();
		    $table->foreign('contact_id')->references('id')->on('contacts');
		    $table->foreign('event_id')->references('id')->on('events');
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
        Schema::dropIfExists('event_attendance');
    }
}
