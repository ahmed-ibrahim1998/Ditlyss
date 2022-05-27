<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsMetaTable extends Migration
{
    public function up()
    {
        Schema::create('ratings_meta', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('key');
            $table->text('value');
            $table->foreignId('rating_id')->constrained('ratings')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ratings_meta');
    }
}
