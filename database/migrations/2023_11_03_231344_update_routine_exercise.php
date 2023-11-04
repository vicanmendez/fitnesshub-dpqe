<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('routine_exercise', function (Blueprint $table) {
            $table->string('sets')->default("3")->nullable()->change();
             $table->string('repetitions')->default("10")->nullable()->change();
             $table->integer('rest_seconds')->default(20)->nullable()->change();
             $table->integer('exercise_seconds')->default(30)->nullable()->change();
             $table->string('progress_metric')->default('Weight (Kg)')->nullable()->change();
             $table->integer('progress_value')->default(0)->nullable()->change();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
