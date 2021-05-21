<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsulansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usulans', function (Blueprint $table) {
            $table->id();
            $table->string('no_usul');
            $table->string('pegawai_nip');
            $table->string('layanan_id');
            $table->string('status')->nullable();
            $table->string('verifikator')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('dokumen_usul');
            $table->string('pengusul');
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
        Schema::dropIfExists('usulans');
    }
}
