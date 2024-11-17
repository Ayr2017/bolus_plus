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
            $table->float('rssi')->nullable();
            $table->float('amm', 8)->nullable();
            $table->float('cmm', 8)->nullable();
            $table->float('vb', 8)->nullable();
            $table->float('adx', 8)->nullable();
            $table->float('ady', 8)->nullable();
            $table->float('adz', 8)->nullable();
            $table->float('cdx', 8)->nullable();
            $table->float('cdy', 8)->nullable();
            $table->float('cdz', 8)->nullable();
            $table->float('ph', 8)->nullable();
            $table->float('pn', 8)->nullable();
            $table->float('ut', 8)->nullable();
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
