<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseOrStudyPlansTable extends Migration
{
    public function up()
    {
        Schema::create('course_or_study_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Adicione a coluna 'name' aqui
            $table->unsignedBigInteger('lang_id');
            $table->timestamps();

            $table->foreign('lang_id')->references('id')->on('langs');
        });
    }

    public function down()
    {
        Schema::dropIfExists('course_or_study_plans');
    }
}
