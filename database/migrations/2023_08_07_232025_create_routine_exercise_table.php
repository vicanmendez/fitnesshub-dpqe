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
         Schema::create('routine_exercise', function (Blueprint $table) {
             $table->id();
             $table->unsignedBigInteger('routine_id');
             $table->unsignedBigInteger('exercise_id');
             $table->integer('sets')->default(3);
             $table->integer('repetitions')->default(10);
             $table->integer('rest_seconds')->default(20);
             $table->integer('exercise_seconds')->default(30);
             $table->string('progress_metric')->default('Weight (Kg)');
             $table->integer('progress_value')->default(0);
             // Other fields...
             $table->timestamps();
     
             $table->foreign('routine_id')->references('id')->on('routines')->onDelete('cascade')->onUpdate('cascade');
             $table->foreign('exercise_id')->references('id')->on('exercises')->onDelete('cascade')->onUpdate('cascade');
         });
     }
     

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routine_exercise');
    }
};
