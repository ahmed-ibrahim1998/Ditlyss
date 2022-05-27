<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients_addresses', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->foreignId('client_id')->constrained('users', 'id')->cascadeOnDelete();
            $table->foreignId('area_id')->constrained('areas', 'id')->cascadeOnDelete();
            $table->string('phone')->nullable();
            $table->string('block')->nullable();
            $table->string('avenue')->nullable();
            $table->string('street')->nullable();
            $table->string('building')->nullable();
            $table->string('floor')->nullable();
            $table->string('flat')->nullable();
            $table->text('details')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('clients_addresses');
    }
}
