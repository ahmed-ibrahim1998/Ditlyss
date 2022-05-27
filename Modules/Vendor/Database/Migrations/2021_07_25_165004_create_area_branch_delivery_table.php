<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaBranchDeliveryTable extends Migration
{
    public function up()
    {
        Schema::create('area_branch_delivery', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('area_id')->nullable()->default(null);
            $table->foreignId('branch_id')->constrained('branches', 'id')->cascadeOnDelete();
            $table->decimal('min_charge')->default(0);
            $table->decimal('delivery_fees')->default(0);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('area_branch_delivery');
    }
}
