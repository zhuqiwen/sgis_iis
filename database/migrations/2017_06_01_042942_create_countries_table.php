<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('countries', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('sort_name');
		    $table->string('name');
		    $table->integer('phone_code');
		    $table->boolean('warning')->nullable()->default(null);
		    $table->string('warning_type')->nullable()->default(null);
		    $table->date('warning_date')->nullable()->default(null);
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
