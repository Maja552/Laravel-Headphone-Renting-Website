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
        Schema::create('rents', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('userId');

            $table->unsignedFloat('totalPrice');
            $table->date('startDate');
            $table->date('endDate');
            $table->date('requestDate');

            $table->unsignedBigInteger('statusId');
            $table->foreign('statusId')
                ->references('id')
                ->on('rentstatuses')
                ->onDelete('no action');

            $table->string('description', 300)->nullable();

            $table->string('deliveryName', 50)->nullable();
            $table->string('deliveryEmail', 50)->nullable();
            $table->string('deliveryPhone', 9)->nullable();
            $table->string('deliveryAddress', 120)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rents');
    }
};
