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
        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->integer('order')->default(0);
            $table->string('title')->nullable();
            $table->foreignId('event_type_id')->constrained('event_types');
            $table->string('type')->nullable();
            $table->json('options')->nullable();
            $table->string('description')->nullable();
            $table->string('rule_update')->nullable();
            $table->string('rule_store')->nullable();
            $table->unique(['event_type_id', 'name']);
            $table->unique(['event_type_id', 'slug']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fields');
    }
};
