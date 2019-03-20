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
            $table->integer('nip')->primary();
            $table->integer('kategori_id')->unsigned();
            $table->integer('status_aktif');
            $table->integer('stream_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('stream_id')->references('stream_id')->on('streams');
            $table->foreign('nip')->references('nip')->on('users');
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
        Schema::drop('juris');
    }
}
