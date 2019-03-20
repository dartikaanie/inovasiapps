<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateinovasisTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inovasis', function (Blueprint $table) {
            $table->increments('inovasi_id');
            $table->integer('tim_id')->unsigned();
            $table->string('area_implementasi');
            $table->integer('nip_inisiator')->index();
            $table->integer('sub_kategori_id')->unsigned();
            $table->string('judul');
            $table->string('latar_belakang');
            $table->string('tujuan_inovasi');
            $table->integer('saving');
            $table->integer('opp_lost');
            $table->integer('status_implementasi');
            $table->date('tgl_pelaksanaan');
            $table->string('dokumen_tim');
            $table->integer('status_registrasi');
            $table->integer('stream_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('tim_id')->references('tim_id')->on('tims');
            $table->foreign('stream_id')->references('stream_id')->on('streams');
            $table->foreign('nip_inisiator')->references('nip')->on('users');
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
        Schema::drop('inovasis');
    }
}
