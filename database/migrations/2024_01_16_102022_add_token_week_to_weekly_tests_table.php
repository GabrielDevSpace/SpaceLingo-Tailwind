<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTokenWeekToWeeklyTestsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('weekly_tests', function (Blueprint $table) {
            $table->string('token_week')->after('translation_test')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('weekly_tests', function (Blueprint $table) {
            $table->dropColumn('token_week');
        });
    }
}
