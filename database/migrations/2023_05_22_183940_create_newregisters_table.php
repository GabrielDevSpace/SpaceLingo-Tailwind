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
        Schema::create('newregisters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lang_id');
            $table->foreign('lang_id')->references('id')->on('langs')->nullable();
            $table->string('vocabulary');
            $table->string('translate');
            $table->string('note');
            $table->string('user_id');
            $table->string('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newregisters');
    }
};
