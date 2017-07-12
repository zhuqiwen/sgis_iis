<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarnedCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('warned_countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('warning')->nullable()->default(null);
            $table->string('warning_type')->nullable()->default(null);
            $table->date('warning_date')->nullable()->default(null);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warned_countries');
    }
}
