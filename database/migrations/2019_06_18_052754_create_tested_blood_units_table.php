<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestedBloodUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tested_blood_units', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hbSag');
            $table->string('HCV');
            $table->string('HIV');
            $table->string('malaria');
            $table->string('syphilis');

            $table->integer('blood_unit_id')->nullable()->unsigned();
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
        Schema::dropIfExists('testing_blood_units');
    }
}
