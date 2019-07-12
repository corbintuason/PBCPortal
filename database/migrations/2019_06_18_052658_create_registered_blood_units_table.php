<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisteredBloodUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registered_blood_units', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('donation_id');
            $table->string('quantity')->nullable();
            $table->string('donor_id');

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
        Schema::dropIfExists('registered_blood_units');
    }
}
