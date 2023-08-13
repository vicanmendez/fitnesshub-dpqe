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
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('active')->default(true);
            $table->boolean('is_admin')->default(false);
            $table->timestamp('last_login')->nullable();
            $table->unsignedBigInteger('city_id')->nullable(); // Foreign key column for city
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');

        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table->dropColumn('active');
        $table->dropColumn('is_admin');
        $table->dropColumn('last_login');
        $table->dropColumn('city_id');

    }
};
