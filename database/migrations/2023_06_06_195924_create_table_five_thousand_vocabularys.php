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
        Schema::create('five_thousand_vocabulary', function (Blueprint $table) {
            $table->id();
            $table->string('word');
            $table->string('translate')->nullable();
            $table->text('use')->nullable();
            $table->text('variation')->nullable();
            $table->text('pronunciation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('five_thousand_vocabulary');
    }
};


