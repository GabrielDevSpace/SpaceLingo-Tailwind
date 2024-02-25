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
        Schema::create('five_thousand_vocabulary_version_two', function (Blueprint $table) {
            $table->id();
            $table->string('word');
            $table->string('translate')->nullable();
            $table->text('use_one')->nullable();
            $table->text('use_two')->nullable();
            $table->text('use_three')->nullable();
            $table->text('translate_one')->nullable();
            $table->text('translate_two')->nullable();
            $table->text('translate_three')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
