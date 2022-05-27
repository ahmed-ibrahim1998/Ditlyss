<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->boolean('is_active')->nullable()->default(null);
            $table->boolean('is_featured')->nullable()->default(null);
            $table->integer('ordering')->nullable()->default(null);
            $table->string('phone')->nullable()->default(null);
            $table->text('address')->nullable()->default(null);
            $table->float('commission')->nullable()->default(0);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trainers');
    }
}
