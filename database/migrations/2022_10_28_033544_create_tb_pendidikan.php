<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPendidikan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pendidikan', function (Blueprint $table) {
            $table->increments('pddkId');
            $table->integer('dapId')->unsigned();
            $table->string('pddkTempatPendidikan');
            $table->date('pddkTahunMasuk');
            $table->date('pddkTahunLulus');
            $table->text('pddkDeskripsi');
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
        Schema::dropIfExists('tb_pendidikan');
    }
}