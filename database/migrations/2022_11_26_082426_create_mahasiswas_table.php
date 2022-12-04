<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_calon_mahasiswa');
            $table->bigInteger('nisn')->unique();
            $table->string('jenis_kartu_identitas');
            $table->bigInteger('no_kartu_identitas')->unique();
            $table->string('jenis_kelamin', 10);
            $table->string('agama', 20);
            $table->string('tempat_lahir', 25);
            $table->string('tanggal_lahir');
            $table->text('alamat_lengkap');
            $table->bigInteger('no_wa')->unique();
            $table->string('email')->unique();
            $table->bigInteger('no_telepon_wali');
            $table->string('sumber_informasi', 20);
            $table->string('nama_pemberi_referensi', 50);
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
        Schema::dropIfExists('mahasiswas');
    }
}
