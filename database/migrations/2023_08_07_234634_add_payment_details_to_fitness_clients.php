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
        Schema::table('fitness_clients', function (Blueprint $table) {
            $table->enum('payment_status', ['Al día', 'Cuota vencida', 'Pendiente'])->default('Pendiente');
            $table->decimal('installment_price', 6, 2)->nullable();
            $table->string('installment_currency')->nullable();
            $table->string('payment_method')->nullable();
        });
    }

    public function down()
    {
        Schema::table('fitness_clients', function (Blueprint $table) {
            $table->dropColumn(['payment_status', 'installment_price', 'installment_currency', 'payment_method']);
        });
    }
};
