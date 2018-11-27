<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_cart', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cart_id');
            $table->integer('product_id');
            $table->string('product_name');
            $table->integer('product_price');
            $table->string('product_amount');
            $table->string('product_unit');
            $table->string('product_count');
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
        Schema::dropIfExists('products_cart');
    }
}
