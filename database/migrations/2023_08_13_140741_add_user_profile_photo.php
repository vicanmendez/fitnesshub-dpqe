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
        //
        //
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('profile_photo')->nullable();

            $table->foreign('profile_photo')->references('id')->on('images')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['profile_photo']);
            $table->dropColumn(['profile_photo']);
        });
    }
};
