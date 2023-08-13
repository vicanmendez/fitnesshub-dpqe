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
        Schema::create('gyms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->unsignedBigInteger('city_id'); // Foreign key column
            $table->string('phone', 20);
            $table->decimal('lat', 10, 8)->nullable();
            $table->decimal('long', 11, 8)->nullable();
            $table->timestamps();

            // Define the foreign key relationship
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('gimnasios', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['city_id']);
        });

        Schema::dropIfExists('gimnasios');
    }

};
