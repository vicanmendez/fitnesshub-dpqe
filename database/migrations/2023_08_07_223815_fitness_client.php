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
    Schema::create('fitness_clients', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id')->unique(); // Foreign key to users table
        $table->string('sex');
        $table->string('country_phone_prefix');
        $table->string('phone')->nullable(false);
        $table->decimal('height', 5, 2);
        $table->decimal('weight', 6, 2);
        $table->string('training_type');
        $table->boolean('require_checkups');
        $table->string('checkups_frequency');
        $table->boolean('require_questionnaire');
        $table->string('questionnaire_link');
        $table->date('last_payment_date')->nullable();
        $table->date('next_expiring_date')->nullable();
        $table->unsignedBigInteger('gym_id'); // Foreign key to gyms table
        // Other fields...
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('gym_id')->references('id')->on('gyms')->onDelete('cascade')->onUpdate('cascade');
        // Add any other foreign keys or constraints here
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //drop fitness_clients table
        Schema::dropIfExists('fitness_clients');

    }
};
