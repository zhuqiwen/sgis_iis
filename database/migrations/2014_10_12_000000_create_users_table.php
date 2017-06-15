<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//	    a user is always an IU student or staff or faculty member
//	    so as long as we have an iu email, the iu_username can be extracted
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('iuid')->unique();
            $table->boolean('is_intern_student')->default(TRUE);
            $table->boolean('is_intern_admin')->default(FALSE);
            $table->boolean('is_alum_admin')->default(FALSE);
            $table->boolean('is_intern_supervisor')->default(FALSE);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
