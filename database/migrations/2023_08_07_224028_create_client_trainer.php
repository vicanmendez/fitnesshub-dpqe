<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('client_trainer', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('trainer_id');
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('fitness_clients')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('trainer_id')->references('id')->on('trainers')->onDelete('cascade')->onUpdate('cascade');
        });
    }

   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_trainer');
    }
};
