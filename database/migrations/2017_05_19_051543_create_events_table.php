<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('events', function(Blueprint $table){
		    $table->increments('id');
		    $table->string('name');
		    $table->date('date')->nullable()->default(NULL);
		    $table->string('country')->nullable()->default(NULL);
		    $table->string('state')->nullable()->default(NULL);
		    $table->string('city')->nullable()->default(NULL);
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
        Schema::dropIfExits('events');
    }
}
