<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatetimsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tims', function (Blueprint $table) {
            $table->increments('tim_id');
            $table->string('nama');
            $table->string('departemen');
            $table->integer('nip')->index();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('nip')->references('nip')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tims');
    }
}
