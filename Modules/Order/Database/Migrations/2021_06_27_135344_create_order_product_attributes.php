<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductAttributes extends Migration
{
    public function up()
    {
        Schema::create('order_product_attributes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_product_id');
            $table->unsignedBigInteger('product_attribute_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_product_attributes');
    }
}
