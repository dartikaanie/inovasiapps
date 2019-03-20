<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatejurisTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juris', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nip')->unsigned();
            $table->integer('kategori_id')->unsigned();
            $table->integer('stream_id')->unsigned();
            $table->integer('status_aktif');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('nip')->references('')->on('');
            $table->foreign('kategori_id')->references('')->on('');
            $table->foreign('stream_id')->references('')->on('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('juris');
    }
}
