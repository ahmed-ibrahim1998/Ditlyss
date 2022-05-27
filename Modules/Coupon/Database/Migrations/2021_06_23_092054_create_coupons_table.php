<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->enum('usage_rule', ['all_customers', 'new_customers']);
            $table->enum('type', ['fixed', 'percentage']);
            $table->integer('amount');
            $table->boolean('free_delivery')->default(0);
            $table->date('start_date');
            $table->date('expiration_date');
            $table->integer('count');
            $table->integer('uses_per_customer');
            $table->text('description')->nullable();
            $table->integer('min_value');
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
        Schema::dropIfExists('coupons');
    }
}
