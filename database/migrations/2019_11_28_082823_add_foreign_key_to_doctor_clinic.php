<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToDoctorClinic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctor_clinics', function (Blueprint $table) {
            //
            $table->integer('doctor_id')->unsigned()->change();
            $table->integer('clinic_id')->unsigned()->change();
            $table->foreign('doctor_id')->references('id')->on('doctor_masters')->onDelete('cascade');
            $table->foreign('clinic_id')->references('id')->on('clinics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctor_clinics', function (Blueprint $table) {
            //
        });
    }
}
