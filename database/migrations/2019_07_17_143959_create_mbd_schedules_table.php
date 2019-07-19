<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMbdSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mbd_schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('mbd_id')->nullable()->unsigned();
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('venue');
            $table->integer('expectedDonors');
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
        Schema::dropIfExists('mbd_schedules');
    }
}
