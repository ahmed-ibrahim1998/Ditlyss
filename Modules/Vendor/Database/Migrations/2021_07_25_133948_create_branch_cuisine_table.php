<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchCuisineTable extends Migration
{
    public function up()
    {
        Schema::create('branch_cuisine', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignId('cuisine_id')->constrained('cuisines', 'id')->cascadeOnDelete();
            $table->foreignId('branch_id')->constrained('branches', 'id')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('branch_cuisine');
    }
}
