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
        Schema::create('routine_program', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('routine_id');
            $table->unsignedBigInteger('program_id');
            // Other fields...
            $table->timestamps();

            $table->foreign('routine_id')->references('id')->on('routines')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade')->onUpdate('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routine_program');
    }
};
