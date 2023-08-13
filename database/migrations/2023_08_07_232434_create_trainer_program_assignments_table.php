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
        Schema::create('trainer_program_assignments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trainer_id');
            $table->unsignedBigInteger('fitness_client_id'); // Add this line
            $table->unsignedBigInteger('program_id');
            $table->text('description');
            $table->text('comments')->nullable();
            $table->timestamp('date_created')->useCurrent();
            $table->boolean('completed')->default(false);
            // Other fields...
            $table->timestamps();

            $table->foreign('trainer_id')->references('id')->on('trainers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('fitness_client_id')->references('id')->on('fitness_clients')->onDelete('cascade')->onUpdate('cascade'); // Add this line
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade')->onUpdate('cascade');
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainer_program_assignments');
    }
};
