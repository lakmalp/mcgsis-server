<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStudents310819 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('admission_no', 10);
            $table->string('first_names', 150);
            $table->string('surname', 100);
            $table->date('dob')->nullable();
            $table->date('date_of_admission')->nullable();
            $table->string('grade_class', 5)->nullable();
            $table->string('add_1', 150)->nullable();
            $table->string('add_2', 150)->nullable();
            $table->string('city', 40)->nullable();
            $table->string('gnd', 100)->nullable();
            $table->boolean('is_scholar')->nullable();
            $table->bigInteger('schol_amount')->nullable();
            $table->boolean('has_special_need')->nullable();
            $table->string('avatar', 250)->nullable();
            $table->bigInteger('house_id')->unsigned()->nullable();
            $table->bigInteger('sport_1_id')->unsigned()->nullable();
            $table->bigInteger('sport_2_id')->unsigned()->nullable();
            $table->bigInteger('sport_3_id')->unsigned()->nullable();
            $table->bigInteger('disability_id')->unsigned()->nullable();

            $table->timestamps();
        });

        Schema::table('students', function ($table) {
            $table->foreign('house_id')->references('id')->on('houses');
            $table->foreign('sport_1_id')->references('id')->on('sports');
            $table->foreign('sport_2_id')->references('id')->on('sports');
            $table->foreign('sport_3_id')->references('id')->on('sports');
            $table->foreign('disability_id')->references('id')->on('disabilities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
