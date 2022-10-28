<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('rId')
                ->references('rId')->on('tb_role')
                ->onUpdate('cascade');
        }); // User ke Role

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('pId')
                ->references('pId')->on('tb_profile')
                ->onUpdate('cascade');
        }); // User ke Profile

        Schema::table('tb_portofolio', function (Blueprint $table) {
            $table->foreign('depId')
                ->references('depId')->on('tb_design_portofolio')
                ->onUpdate('cascade');
        }); // Portofolio ke Design Portofolio

        Schema::table('tb_portofolio', function (Blueprint $table) {
            $table->foreign('dapId')
                ->references('dapId')->on('tb_data_portofolio')
                ->onUpdate('cascade');
        }); // Portofolio ke Data Portofolio

        Schema::table('tb_portofolio', function (Blueprint $table) {
            $table->foreign('idUser')
                ->references('id')->on('users')
                ->onUpdate('cascade');
        }); // Portofolio ke Users

        Schema::table('tb_pengalaman', function (Blueprint $table) {
            $table->foreign('dapId')
                ->references('dapId')->on('tb_data_portofolio')
                ->onUpdate('cascade');
        }); // Pengalaman ke Data Portofolio

        Schema::table('tb_pendidikan', function (Blueprint $table) {
            $table->foreign('dapId')
                ->references('dapId')->on('tb_data_portofolio')
                ->onUpdate('cascade');
        }); // Pendidikan ke Data Portofolio
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}