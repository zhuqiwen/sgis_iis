<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('intern_applications', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('year');
		    $table->string('term');
		    $table->string('country');
		    $table->string('state');
		    $table->string('city');
		    $table->string('street');
		    $table->integer('credit_hours');
		    $table->integer('budget_airfare');
		    $table->integer('budget_living_per_day');
		    $table->integer('budget_accommodation');
		    $table->date('depart_date');
		    $table->date('return_date');
		    $table->date('start_date');
		    $table->date('end_date');
		    $table->integer('work_hours_per_week');
		    $table->text('work_schedule')->nullable();
		    $table->text('description');
		    $table->text('reasons');
		    $table->text('cultural_interaction');
		    $table->text('challenges');
		    $table->integer('user_id')->unsigned();
		    $table->foreign('user_id')->references('id')->on('users');
		    $table->integer('organization_id')->unsigned();
		    $table->foreign('organization_id')->references('id')->on('intern_organizations');
		    $table->integer('supervisor_id')->unsigned();
		    $table->foreign('supervisor_id')->references('id')->on('intern_supervisors');
		    $table->boolean('paid_internship')->default(FALSE);
		    $table->boolean('liability_release_form_signed')->default(FALSE);
		    $table->boolean('is_approved')->default(FALSE);
		    $table->boolean('is_submitted')->default(FALSE);
		    $table->boolean('country_warning')->default(FALSE);
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
	    Schema::dropIfExists('intern_applications');
    }
}
