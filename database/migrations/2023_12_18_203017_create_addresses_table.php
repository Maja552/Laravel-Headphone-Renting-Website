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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();

            $table->string('name', 50)->nullable();
            $table->string('surname', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('phone', 9)->nullable();
            $table->string('street', 50)->nullable();
            $table->string('house_number', 20)->nullable();
            $table->string('apartment_number', 20)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('postal_code', 6)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
