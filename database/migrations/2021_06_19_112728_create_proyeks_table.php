<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyeks', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi');
            $table->string('foto_produk');
            $table->date('waktu_pengerjaan_proyek_mulai');
            $table->date('waktu_pengerjaan_proyek_berakhir');
            $table->unsignedBigInteger('dana_dibutuhkan');
            $table->date('tanggal_pendanaan_dibuka');
            $table->date('tanggal_pendanaan_ditutup');
            $table->unsignedBigInteger('dana_terkumpul')->default(0);
            $table->unsignedSmallInteger('akad_id');
            $table->timestamps();

            $table->foreign('akad_id')->references('id')->on('akads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_proyeks');
    }
}
