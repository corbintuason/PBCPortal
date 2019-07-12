<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DonorPersonalDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donor_personal_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sex');
            $table->string('civil_status');
            $table->date('birthdate');
            $table->string('contact_number');
            $table->string('occupation');
            $table->string('nationality');

            $table->integer('donor_id')->nullable()->unsigned();
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
        //
    }
}
