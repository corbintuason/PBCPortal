<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('donation_id')->nullable()->unsigned();
            $table->integer('mbd_id')->nullable()->unsigned();
            $table->integer('mbd_schedule_id')->nullable()->unsigned();
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
        Schema::dropIfExists('donor_lists');
    }
}
