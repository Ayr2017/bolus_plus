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
            $table->decimal('RSSI', 8,2)->nullable();
            $table->decimal('AmM', 8,2)->nullable();
            $table->decimal('CmM', 8,2)->nullable();
            $table->decimal('VB', 8,2)->nullable();
            $table->decimal('AdX', 8,2)->nullable();
            $table->decimal('AdY', 8,2)->nullable();
            $table->decimal('AdZ', 8,2)->nullable();
            $table->decimal('CdX', 8,2)->nullable();
            $table->decimal('CdY', 8,2)->nullable();
            $table->decimal('CdZ', 8,2)->nullable();
            $table->decimal('PH', 8,2)->nullable();
            $table->decimal('PN', 8,2)->nullable();
            $table->decimal('UT', 8,2)->nullable();
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
