<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('nip')->primary();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('role_id');
            $table->integer('jekel');
            $table->integer('unit_biro');
            $table->integer('jabatan');
            $table->rememberToken();
            $table->timestamps();

//            $table->foreign('role_id')->get(role_id)->
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
