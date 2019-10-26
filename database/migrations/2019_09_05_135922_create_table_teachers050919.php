<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTeachers050919 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('teacher_id', 10);
            $table->string('first_names', 150);
            $table->string('surname', 100);
            $table->string('contact_no', 15)->nullable();
            $table->string('address', 250)->nullable();
            $table->string('gender', 20)->nullable();
            $table->string('class', 10)->nullable();
            $table->string('qualification', 50)->nullable();
            $table->date('date_of_appointment')->nullable();
            $table->bigInteger('service')->nullable();
            $table->bigInteger('prev_school_id')->unsigned()->nullable();
            $table->string('teacher_in_charge', 250)->nullable();
            $table->timestamps();
        });

        Schema::table('teachers', function ($table) {
            $table->foreign('prev_school_id')->references('id')->on('schools');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
