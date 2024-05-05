<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('headphones', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->unique();

            $table->unsignedBigInteger('idManufacturer');
            $table->foreign('idManufacturer')
                ->references('id')
                ->on('manufacturers')
                ->onDelete('no action');

            $table->unsignedBigInteger('idDrivertechnology');
            $table->foreign('idDrivertechnology')
                ->references('id')
                ->on('drivertechnologies')
                ->onDelete('no action');

            $table->unsignedBigInteger('idFittype');
            $table->foreign('idFittype')
                ->references('id')
                ->on('fittypes')
                ->onDelete('no action');

            $table->unsignedBigInteger('idBacktype');
            $table->foreign('idBacktype')
                ->references('id')
                ->on('backtypes')
                ->onDelete('no action');

            $table->year('releaseYear');
            $table->smallInteger('weight');
            $table->smallInteger('impedance');
            $table->smallInteger('sensitivity');
            $table->string('sensitivityUnit', 10);
            $table->string('driverSize', 20);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('headphones');
    }
};
