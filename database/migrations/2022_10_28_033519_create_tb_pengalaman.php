<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPengalaman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pengalaman', function (Blueprint $table) {
            $table->increments('pglmId');
            $table->integer('dapId')->unsigned();
            $table->string('pglmNamaPerusahaan');
            $table->date('pglmTahunMasuk');
            $table->date('pglmTahunKeluar');
            $table->text('pglmDeskripsi');
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
        Schema::dropIfExists('tb_pengalaman');
    }
}