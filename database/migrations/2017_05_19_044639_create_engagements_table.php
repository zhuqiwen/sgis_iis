<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEngagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('engagements', function (Blueprint $table){
	        $table->increments('id');
	        $table->integer('contact_id')->unsigned();
	        $table->integer('indicator_id')->unsigned();
	        $table->foreign('contact_id')->references('id')->on('contacts');
	        $table->foreign('indicator_id')->references('id')->on('engagement_indicators');
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
        Schema::dropIfExists('engagements');
    }
}
