<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatekriteriasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kriterias', function (Blueprint $table) {
            $table->increments('kriteria_id');
            $table->integer('kategori_id')->unsigned();
            $table->string('nama_kriteria');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('kategori_id')->references('kategori_id')->on('kategoris');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kriterias');
    }
}
