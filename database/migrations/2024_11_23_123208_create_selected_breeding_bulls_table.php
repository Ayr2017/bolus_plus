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
        Schema::create('selected_breeding_bulls', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // Type
            $table->string('semen_supplier')->nullable(); // Поставщик семени
            $table->string('nickname')->nullable(); // Кличка
            $table->date('date_of_birth')->nullable(); // Дата рождения
            $table->string('country_of_birth')->nullable(); // Страна рождения
            $table->string('tag_number')->nullable(); // Номер бирки
            $table->string('semen_code')->nullable(); // Код семени
            $table->string('rshn_id')->unique(); // Идентификационный номер РСХН
            $table->string('color')->nullable(); // Масть
            $table->unsignedBigInteger('breed_id')->nullable(); // Порода
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('selected_breeding_bulls');
    }
};
