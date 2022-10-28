<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPortofolio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_portofolio', function (Blueprint $table) {
            $table->increments('porId');
            $table->integer('depId')->unsigned();
            $table->integer('dapId')->unsigned();
            $table->integer('idUser')->unsigned();
            $table->integer('token');
            $table->enum('porStatus', ['0', '1']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_portofolio');
    }
}