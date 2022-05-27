<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->integer('status')->default(1);
            $table->string('subscription_type')->nullable();
            $table->integer('subscription_value')->nullable();
            $table->foreignId('vehicle_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('civil_id');
            $table->text('images')->nullable();
            $table->text('profile_pic')->nullable();

            // $table->foreign('vehicle_id')->on('vehicles')->references('id')->onUpdate('cascade')->onDelete('set null');

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
        Schema::dropIfExists('drivers');
    }
}
