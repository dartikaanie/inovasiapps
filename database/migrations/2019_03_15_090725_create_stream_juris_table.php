<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatestreamJurisTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stream_juris', function (Blueprint $table) {
            $table->increments('stream_juri_id');
            $table->integer('stream_id')->unsigned();
            $table->integer('nip_juri')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('stream_id')->references('stream_id')->on('streams');
            $table->foreign('nip_juri')->references('nip')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stream_juris');
    }
}
