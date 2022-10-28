<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbDesignPortofolio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_design_portofolio', function (Blueprint $table) {
            $table->increments('depId');
            $table->string('depNama');
            $table->longText('codeHTML');
            $table->longText('codeCSS');
            $table->longText('codeJS');
            $table->longText('depDeskripsi');
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
        Schema::dropIfExists('tb_design_portofolio');
    }
}