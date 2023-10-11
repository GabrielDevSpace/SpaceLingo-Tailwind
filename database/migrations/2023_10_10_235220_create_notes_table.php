<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->text('notes');
            $table->unsignedBigInteger('lang_id');
            $table->unsignedBigInteger('course_or_study_plan_id');
            $table->unsignedBigInteger('topic_id');
            $table->timestamps();

            $table->foreign('lang_id')->references('id')->on('langs');
            $table->foreign('course_or_study_plan_id')->references('id')->on('course_or_study_plans');
            $table->foreign('topic_id')->references('id')->on('topics');
        });
    }

    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
