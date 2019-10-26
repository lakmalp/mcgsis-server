<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableGuardians140919 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardians', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_id')->unsigned()->nullable();
            $table->string('f_initials', 100)->nullable();
            $table->string('f_surname', 100)->nullable();
            $table->string('f_contact_no', 15)->nullable();
            $table->string('f_occupation', 100)->nullable();
            $table->string('f_work_place', 100)->nullable();
            $table->string('m_initials', 100)->nullable();
            $table->string('m_surname', 100)->nullable();
            $table->string('m_contact_no', 15)->nullable();
            $table->string('m_occupation', 100)->nullable();
            $table->string('m_work_place', 100)->nullable();
            $table->string('g_initials', 100)->nullable();
            $table->string('g_surname', 100)->nullable();
            $table->string('g_contact_no', 15)->nullable();
            $table->boolean('is_old_boy')->nullable();
            $table->bigInteger('total_donations')->nullable();
            $table->timestamps();
        });

        Schema::table('guardians', function ($table) {
            $table->foreign('student_id')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guardians');
    }
}
