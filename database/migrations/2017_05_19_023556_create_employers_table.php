<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('employers', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('name');
		    $table->string('web_address')->nullable();
		    $table->integer('type_id')->unsigned();
		    $table->foreign('type_id')->references('id')->on('employer_types');
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
	    Schema::dropIfExists('employers');

    }
}
