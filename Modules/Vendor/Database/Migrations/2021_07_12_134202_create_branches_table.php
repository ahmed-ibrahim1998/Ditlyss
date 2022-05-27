<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name')->nullable()->default(null);
            $table->foreignId('vendor_id')->constrained('vendors', 'id')->cascadeOnDelete();
            $table->unsignedBigInteger('area_id')->nullable()->default(null);
            $table->string('status')->nullable()->default(null);
            $table->enum('is_active',['open','close']);
            $table->string('lat')->nullable()->default(null);
            $table->string('long')->nullable()->default(null);
            $table->text('address')->nullable()->default(null);
            $table->boolean('is_featured')->default(false);
            $table->float('delivery_time')->nullable()->default(null);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('branches');
    }
}
