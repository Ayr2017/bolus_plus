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
        Schema::table('animals', function (Blueprint $table) {
            $table->string('number_rshn')->nullable();
            $table->bigInteger('bolus_id')->nullable();
            $table->string('number_rf')->nullable();
            $table->string('number_tavro')->nullable();
            $table->string('number_tag')->nullable();
            $table->string('tag_color')->nullable();
            $table->string('number_collar')->nullable();
            $table->string('status_id')->nullable();
            $table->enum('sex',['female', 'male'])->nullable();
            $table->dateTime('withdrawal_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('animals', function (Blueprint $table) {
            $table->dropColumn([
                'number_rshn',
                'bolus_id',
                'number_rf',
                'number_tavro',
                'number_tag',
                'tag_color',
                'number_collar',
                'status_id',
                'sex',
                'withdrawal_at',
                ]);
        });
    }
};
