<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicsTable extends Migration
{
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('course_or_study_plan_id');
            $table->timestamps();

            $table->foreign('course_or_study_plan_id')->references('id')->on('course_or_study_plans');
        });
    }

    public function down()
    {
        Schema::dropIfExists('topics');
    }
}
