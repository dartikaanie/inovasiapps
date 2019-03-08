<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatekriteraiaKategoriPenilaiansTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kriteraia_kategori_penilaians', function (Blueprint $table) {
            $table->increments('kriteria_katategori_id');
            $table->integer('sub_kriteria_id')->unsigned();
            $table->integer('sub_kategori_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('sub_kriteria_id')->references('sub_kriteria_id')->on('sub_kriterias');
            $table->foreign('sub_kategori_id')->references('sub_kategori_id')->on('sub_kategoris');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kriteraia_kategori_penilaians');
    }
}
