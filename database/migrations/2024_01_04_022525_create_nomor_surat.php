<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNomorSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nomor_surat', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_surat');
            $table->integer('nomor_surat')->nullable(true)->change();
            $table->integer('sub_nomor_surat')->nullable(true)->change();
            $table->string('perihal', 255);
            $table->integer('id_unit')->nullable(true)->change();
            $table->date('tgl_permintaan');
            $table->integer('status')->nullable(true)->change();
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
        Schema::dropIfExists('nomor_surat');
    }
}
