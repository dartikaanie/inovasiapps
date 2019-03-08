<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatesubKriteriasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_kriterias', function (Blueprint $table) {
            $table->increments('sub_kriteria_id');
            $table->integer('kriteria_id')->unsigned();
            $table->string('sub_kriteria');
            $table->string('rentang1');
            $table->string('keterangan1');
            $table->string('rentang2');
            $table->string('keterangan2');
            $table->string('rentang3');
            $table->string('keterangan3');
            $table->string('rentang4');
            $table->string('keterangan4');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('kriteria_id')->references('kriteria_id')->on('kriterias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sub_kriterias');
    }
}
