<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('contacts', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('first_name');
		    $table->string('middle_name')->nullable();
		    $table->string('last_name');
		    $table->string('email')->nullable();
		    $table->string('phone_home')->nullable();
		    $table->string('phone_mobile')->nullable();
		    $table->string('address_country')->nullable();
		    $table->string('address_state')->nullable();
		    $table->string('address_city')->nullable();
		    $table->string('address_line1')->nullable();
		    $table->string('address_line2')->nullable();
		    $table->string('address_zip')->nullable();
		    $table->boolean('no_email')->default(FALSE);
		    $table->boolean('no_phone_call')->default(FALSE);
		    $table->boolean('no_mail')->default(FALSE);
		    $table->boolean('iuaa_member')->default(FALSE);
		    $table->boolean('share_with_iuaa')->default(FALSE);
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
	    Schema::dropIfExists('contacts');
    }
}
