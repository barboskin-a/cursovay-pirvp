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
        Schema::create('users_shopping_cart', function (Blueprint $table) {
            $table->id_shopping_cart()->primary();
            $table->foreignId('id_user');
            $table->foreignId('id_product');
            $table->integer('quantity_product');
            $table->integer('amount_to_pay');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_shopping_cart');
    }
};
