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
        Schema::create('application_acceptance', function (Blueprint $table) {
            $table->id_application_acceptance()->primary();
            $table->foreignId('id_application');
            $table->foreignId('id_admin');
            $table->foreignId('id_user');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_acceptance');
    }
};
