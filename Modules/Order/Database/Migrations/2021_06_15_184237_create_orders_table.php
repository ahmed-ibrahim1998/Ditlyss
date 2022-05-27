<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('area_id')->nullable()->default(null);
            $table->unsignedBigInteger('driver_id')->nullable()->default(null);
            $table->unsignedBigInteger('coupon_id')->nullable()->default(null);
            $table->unsignedBigInteger('branch_id')->nullable()->default(null);
            $table->decimal('subtotal')->nullable()->default(null);
            $table->decimal('delivery_fees')->nullable()->default(null);
            $table->decimal('discount')->nullable()->default(null);
            $table->decimal('total')->nullable()->default(null);
            $table->foreignId('status_id')->nullable()->constrained('order_statuses', 'id')->cascadeOnDelete();
            $table->timestamp('prepared_at')->nullable()->default(null);
            $table->timestamp('handed_at')->nullable()->default(null);
            $table->timestamp('delivered_at')->nullable()->default(null);
            $table->text('payment_url')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
