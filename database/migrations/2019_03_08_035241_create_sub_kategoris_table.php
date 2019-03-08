<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatesubKategorisTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_kategoris', function (Blueprint $table) {
            $table->increments('sub_kategori_id');
            $table->integer('kategori_id')->unsigned();
            $table->string('nama_sub_kategori');
            $table->text('keterangan');
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
        Schema::drop('sub_kategoris');
    }
}
