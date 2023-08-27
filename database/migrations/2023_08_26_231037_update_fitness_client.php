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
        Schema::table('fitness_clients', function (Blueprint $table) {
            $table->string('sex')->nullable()->change();
            $table->string('country_phone_prefix')->nullable()->change();
            $table->string('phone')->nullable()->change();
            $table->decimal('height', 5, 2)->nullable()->change();
            $table->decimal('weight', 6, 2)->nullable()->change();
            $table->string('training_type')->nullable()->change();
            $table->boolean('require_checkups')->nullable()->change();
            $table->string('checkups_frequency')->nullable()->change();
            $table->boolean('require_questionnaire')->nullable()->change();
            $table->string('questionnaire_link')->nullable()->change();
            // Update other columns as needed
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
