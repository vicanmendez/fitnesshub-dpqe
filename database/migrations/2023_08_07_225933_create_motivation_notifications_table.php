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
        Schema::create('motivation_notifications', function (Blueprint $table) {
            $table->id();
            $table->text('body');
            $table->timestamp('created_at')->useCurrent();
            $table->unsignedBigInteger('trainer_id');
            // Other fields...

            $table->foreign('trainer_id')->references('id')->on('trainers')->onDelete('cascade')->onUpdate('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motivation_notifications');
    }
};
