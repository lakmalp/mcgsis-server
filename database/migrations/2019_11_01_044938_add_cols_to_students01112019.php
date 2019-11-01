<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColsToStudents01112019 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->char('olevel_nine_a')->nullable()->default("0");
            $table->char('ol_mahindian')->nullable()->default("0");
            $table->char('grade_5_passed')->nullable()->default("0");
            $table->char('schol_mahindian')->nullable()->default("0");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('olevel_nine_a');
            $table->dropColumn('ol_mahindian');
            $table->dropColumn('grade_5_passed');
            $table->dropColumn('schol_mahindian');
        });
    }
}
