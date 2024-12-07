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
        Schema::create('boluses', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('device_number')->nullable();
            $table->string('version')->nullable();
            $table->string('batch_number')->nullable();
            $table->dateTime('produced_at')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buluses');
    }
};
