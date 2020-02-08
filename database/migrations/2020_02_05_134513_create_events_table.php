<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      

        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('event_type');
            $table->string('venue');
            $table->string('added_by');
            $table->string('image');
            $table->string('time_of_event');
            $table->string('link');
            $table->string('verified');
            $table->text('description');
            $table->string('location');
            $table->string('user_type');
            $table->text('country');
            $table->string('region');
            $table->string('category');
            $table->string('price');
            $table->text('contact');
            $table->text('session_objectives');
            $table->date('date_from');
            $table->date('date_to');
            $table->string('time_from');
            $table->string('time_to');
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
        Schema::dropIfExists('events');
    }
}
