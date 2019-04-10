<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellerRetoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_retours', function (Blueprint $table) {
             $table->bigIncrements('id');
            $table->dateTime('date');
            $table->integer('total_ht');
            $table->integer('total_tva');
            $table->integer('total_ttc');
            $table->integer('discount');
            $table->string('net_apayer');
            $table->text('notes')->nullable(); 

            $table->integer('payment_mode_id')->unsigned();
            $table->foreign('payment_mode_id')
                  ->references('id')->on('payment_modes');

            $table->integer('seller_id')->unsigned();     
            $table->foreign('seller_id')
                  ->references('id')->on('sellers');

            $table->softDeletes(); 
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
        Schema::dropIfExists('seller_retours');
    }
}
