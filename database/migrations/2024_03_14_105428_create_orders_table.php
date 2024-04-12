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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('shipping_adress')->default('N/A');
            $table->string('shipping_city')->default('N/A');
            $table->string('shipping_region')->default('N/A');
            $table->text('additional_info')->nullable();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->integer('delivery_method')->default(1);
            $table->integer('payement_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
