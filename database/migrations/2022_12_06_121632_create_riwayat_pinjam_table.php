<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_pinjam', function (Blueprint $table) {
            $table->bigIncrements('id_riwayat');
            $table->integer('id_siswa');
            $table->integer('id_buku');
            $table->date('tanggal_kembali');
            $table->bigInteger('denda')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('riwayat_pinjam');
    }
};
