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
        Schema::create('weekly_tests', function (Blueprint $table) {
            $table->id();
            $table->string('vocabularies');
            $table->string('user_id');
            $table->string('lang_id');
            $table->text('original');
            $table->text('translation');
            $table->text('translation_test');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weekly_tests');
    }
};
