<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reference',50)->unique();
            $table->string('name',250);
            $table->integer('buying_price_ttc');
            $table->integer('sell_price_ttc');
            $table->integer('taux_tva');
            $table->string('img_path')->nullable();
            $table->text('notes')->nullable();;
            $table->integer('initial_stock')->unsigned();

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')
                  ->references('id')->on('categories');

            $table->integer('subcategory_id')->unsigned();
            $table->foreign('subcategory_id')
                  ->references('id')->on('subcategories');

            $table->integer('seller_id')->unsigned();    
            $table->foreign('seller_id')
                  ->references('id')->on('sellers');

            $table->boolean('isActive')->default(true);
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
        Schema::dropIfExists('products');
    }
}
