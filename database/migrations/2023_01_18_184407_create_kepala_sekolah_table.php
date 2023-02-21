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
        Schema::create('kepala_sekolah', function (Blueprint $table) {
            $table->bigIncrements('id_kepsek');
            $table->string('nip_kepsek');
            $table->string('nama_kepsek');
            $table->enum('jenis_kelamin_kepsek', ['p', 'l']);
            $table->date('tgl_lahir_kepsek');
            $table->text('foto_kepsek');
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
        Schema::dropIfExists('kepala_sekolah');
    }
};
