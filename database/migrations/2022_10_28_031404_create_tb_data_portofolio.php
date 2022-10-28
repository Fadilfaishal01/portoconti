<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbDataPortofolio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_data_portofolio', function (Blueprint $table) {
            $table->increments('dapId');
            $table->string('dapFoto')->default('default.png');
            $table->string('dapNama');
            $table->string('dapTempatLahir');
            $table->string('dapTanggalLahir');
            $table->string('dapStatus');
            $table->string('dapAgama');
            $table->string('dapDeskripsi');
            $table->string('dapEmail');
            $table->string('dapWhatsapp');
            $table->string('dapTelepon');
            $table->string('dapAlamat');
            $table->json('dapSkill');
            $table->json('dapHobby');
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
        Schema::dropIfExists('tb_data_portofolio');
    }
}