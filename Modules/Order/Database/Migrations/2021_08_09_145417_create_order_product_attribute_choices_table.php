<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductAttributeChoicesTable extends Migration
{
    public function up()
    {
        Schema::create('order_product_attribute_choices', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('order_product_attribute_id');
            $table->foreign('order_product_attribute_id', 'o_p_a_id')->references('id')->on('order_product_attributes')->cascadeOnDelete();
            $table->unsignedBigInteger('product_attribute_choice_id')->nullable()->default(null);
            $table->float('price')->nullable()->default(0);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_product_attribute_choices');
    }
}
