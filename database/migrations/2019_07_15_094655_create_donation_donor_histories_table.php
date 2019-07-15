<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationDonorHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation_donor_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('donation_id')->nullable()->unsigned()->unique();
            $table->boolean('answer_1');
            $table->boolean('answer_2');
            $table->boolean('answer_3');
            $table->boolean('answer_4');
            $table->boolean('answer_5');
            $table->boolean('answer_6');
            $table->boolean('answer_7');
            $table->boolean('answer_8');
            $table->boolean('answer_9');
            $table->boolean('answer_10');
            $table->boolean('answer_11');
            $table->boolean('answer_12');
            $table->boolean('answer_13');
            $table->boolean('answer_14');
            $table->boolean('answer_15');
            $table->boolean('answer_16');
            $table->boolean('answer_17');
            $table->boolean('answer_18');
            $table->boolean('answer_19');
            $table->boolean('answer_20');
            $table->boolean('answer_21');
            $table->boolean('answer_22');
            $table->boolean('answer_23');
            $table->boolean('answer_24');
            $table->boolean('answer_25');
            $table->boolean('answer_26');
            $table->string('verdict');
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('donation_donor_histories');
    }
}
