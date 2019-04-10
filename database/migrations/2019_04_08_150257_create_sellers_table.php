<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('seller');
            $table->string('img_path')->nullable();
            $table->boolean('professionel')->default(true);
            $table->string('gsm')->nullable();
            $table->string('fix')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->unique();
            $table->string('codepostal')->nullable();
            $table->string('city')->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('sellers');
    }
}
