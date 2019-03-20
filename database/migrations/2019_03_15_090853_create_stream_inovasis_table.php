<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatestreamInovasisTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stream_inovasis', function (Blueprint $table) {
            $table->increments('stream_inovasi_id');
            $table->integer('stream_id')->unsigned();
            $table->integer('inovasi_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('stream_id')->references('stream_id')->on('streams');
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
        Schema::drop('stream_inovasis');
    }
}
