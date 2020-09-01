<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanSoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_soal', function (Blueprint $table) {
            $table->id();
            $table->longText('pila');
            $table->longText('pilb');
            $table->longText('pilc');
            $table->longText('pild');
            $table->string('jawaban', 1);
            $table->bigInteger('id_soal')->unsigned();
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
        Schema::dropIfExists('jawaban_soal');
    }
}
