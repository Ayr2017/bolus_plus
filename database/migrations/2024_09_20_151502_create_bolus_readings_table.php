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
            $table->dateTimeTz('date');
            $table->string('device_number');
            $table->decimal('RSSI', 8,2);
            $table->decimal('AmM', 8,2);
            $table->decimal('CmM', 8,2);
            $table->decimal('VB', 8,2);
            $table->decimal('AdX', 8,2);
            $table->decimal('AdY', 8,2);
            $table->decimal('AdZ', 8,2);
            $table->decimal('CdX', 8,2);
            $table->decimal('CdY', 8,2);
            $table->decimal('CdZ', 8,2);
            $table->decimal('PH', 8,2);
            $table->decimal('PN', 8,2);
            $table->decimal('UT', 8,2);
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
