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
        Schema::create('bolus_readings', function (Blueprint $table) {
            $table->id();
            $table->dateTimeTz('date')->index();
            $table->string('device_number');
            $table->decimal('rssi', 8,2)->nullable();
            $table->decimal('amm', 8,2)->nullable();
            $table->decimal('cmm', 8,2)->nullable();
            $table->decimal('vb', 8,2)->nullable();
            $table->decimal('adx', 8,2)->nullable();
            $table->decimal('ady', 8,2)->nullable();
            $table->decimal('adz', 8,2)->nullable();
            $table->decimal('cdx', 8,2)->nullable();
            $table->decimal('cdy', 8,2)->nullable();
            $table->decimal('cdz', 8,2)->nullable();
            $table->decimal('ph', 8,2)->nullable();
            $table->decimal('pn', 8,2)->nullable();
            $table->decimal('ut', 8,2)->nullable();
            $table->unique(['device_number', 'date']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bolus_readings');
    }
};
