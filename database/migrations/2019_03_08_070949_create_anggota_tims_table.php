<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnggotaTimsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota_tims', function (Blueprint $table) {
            $table->increments('anggota_tim_id');
            $table->integer('nip')->index();
            $table->integer('tim_id')->index();
            $table->integer('status_anggota_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('nip')->references('nip')->on('users');
            $table->foreign('tim_id')->references('tim_id')->on('tims');
            $table->foreign('status_anggota_id')->references('status_anggota_id')->on('status_anggotas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('anggota_tims');
    }
}
