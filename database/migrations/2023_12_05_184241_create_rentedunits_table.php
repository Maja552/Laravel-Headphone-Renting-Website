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
        Schema::create('rentedunits', function (Blueprint $table) {
            $table->id();
            $table->integer('price');

            $table->unsignedBigInteger('idRent');
            $table->foreign('idRent')
                ->references('id')
                ->on('rents')
                ->onDelete('no action');

            $table->unsignedBigInteger('idUnit');
            $table->foreign('idUnit')
                ->references('id')
                ->on('units')
                ->onDelete('no action');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentedunits');
    }
};
