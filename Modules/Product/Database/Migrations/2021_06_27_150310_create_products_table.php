<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->foreignId('cat_id')->constrained('product_categories', 'id')->cascadeOnDelete();
            $table->unsignedBigInteger('branch_id');
            $table->decimal('price');
            $table->boolean('is_active')->default(true);
            $table->double('overall_rating')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
