<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatestreamsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('streams', function (Blueprint $table) {
            $table->increments('stream_id');
            $table->integer('nip_juri')->index();
            $table->integer('inovasi_id')->unsigned();
            $table->string('nama_stream');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('nip_juri')->references('nip')->on('users');
            $table->foreign('inovasi_id')->references('inovasi_id')->on('inovasis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('streams');
    }
}
