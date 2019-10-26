<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColsToSports110919 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sports', function (Blueprint $table) {
            $table->string('sport_id', 10);
            $table->bigInteger('teacher_incharge_id')->unsigned()->nullable();
            $table->string('master_coach', 100)->nullable();
            $table->string('sub_coach', 100)->nullable();
            $table->string('physio', 100)->nullable();
            $table->bigInteger('master_coach_wage')->nullable();
            $table->bigInteger('sub_coach_wage')->nullable();
            $table->bigInteger('annual_allocated_budget')->nullable();
        });

        Schema::table('sports', function ($table) {
            $table->foreign('teacher_incharge_id')->references('id')->on('teachers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sports', function (Blueprint $table) {
            $table->dropForeign(['teacher_incharge_id']);
            $table->dropColumn('sport_id');
            $table->dropColumn('teacher_incharge_id');
            $table->dropColumn('master_coach');
            $table->dropColumn('sub_coach');
            $table->dropColumn('physio');
            $table->dropColumn('master_coach_wage');
            $table->dropColumn('sub_coach_wage');
            $table->dropColumn('annual_allocated_budget');
        });
    }
}
