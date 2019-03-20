<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatekendalasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendalas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inovasi_id')->unsigned();
            $table->string('isi_kendala');
            $table->string('solusi');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('inovasi_id')->references('inovasis')->on('inovasi_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kendalas');
    }
}
