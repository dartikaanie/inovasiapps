<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatepenilaianTimsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian_tims', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stream_id')->unsigned();
            $table->integer('sub_kriteria_id')->unsigned();
            $table->integer('nilai');
            $table->string('saran');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('stream_id')->references('stream_id')->on('streams');
            $table->foreign('sub_kriteria_id')->references('sub_kriteria_id')->on('sub_kriterias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('penilaian_tims');
    }
}
