<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcessedBloodUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processed_blood_units', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('whole_blood');
            $table->integer('packed_rbc');
            $table->integer('platelet_concentrate');
            $table->integer('ffp');
            $table->integer('cryoprecipitate');
            $table->integer('cryosupernate');

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
        Schema::dropIfExists('processing_blood_units');
    }
}
