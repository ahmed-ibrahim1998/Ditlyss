<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorUserTable extends Migration
{
    public function up()
    {
        Schema::create('vendor_user', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignId('user_id')->constrained('users', 'id')->cascadeOnDelete();
            $table->foreignId('vendor_id')->constrained('vendors', 'id')->cascadeOnDelete();
            $table->foreignId('branch_id')->constrained('branches', 'id')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vendor_user');
    }
}
