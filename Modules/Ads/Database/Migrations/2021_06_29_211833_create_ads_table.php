<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('photo')->nullable();
            $table->text('video_url')->nullable();
            $table->boolean('is_photo')->default(1);
            $table->text('url')->nullable();
            $table->integer('position')->default(1);
            $table->integer('location')->default(1);
            $table->integer('priority')->default(1);
            $table->boolean('is_active')->default(1);
            $table->integer('link_id')->nullable();
            $table->string('link_model')->nullable();

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
        Schema::dropIfExists('ads');
    }
}
