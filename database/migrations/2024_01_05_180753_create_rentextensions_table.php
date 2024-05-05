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
        Schema::create('rentextensions', function (Blueprint $table) {
            $table->id();

            $table->date('requestDate');
            $table->date('oldEndDate');
            $table->date('newEndDate');

            $table->unsignedBigInteger('idRent');
            $table->foreign('idRent')
                ->references('id')
                ->on('rents')
                ->onDelete('no action');

            $table->integer('price');
            $table->string('description', 300)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentextensions');
    }
};
