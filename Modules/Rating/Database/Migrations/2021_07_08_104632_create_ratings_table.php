<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id');

            $table->nullableMorphs('ratable'); // product , driver, branch

            $table->unsignedBigInteger('user_id');

            $table->float('order_packaging')->nullable()->default(null);
            $table->float('delivery_time')->nullable()->default(null);
            $table->float('value_for_price')->nullable()->default(null);
            $table->float('driver_performance')->nullable()->default(null);

            $table->float('rate')->nullable()->default(0);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ratings');
    }
}
