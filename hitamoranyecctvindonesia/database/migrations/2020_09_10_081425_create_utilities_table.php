<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilities', function (Blueprint $table) {
            $table->id();
            $table->string('nama_website',32);
            $table->text('logo');
            $table->string('slogan',64);
            $table->string('nama_perusahaan',128);
            $table->string('kalimat_penarik_pelanggan', 168);
            $table->text('alamat_perusahaan');
            $table->text('tentang_kami');
            $table->text('visi');
            $table->text('misi');
            $table->string('nomor_telepon', 16);
            $table->string('nomor_whatsapp', 16);
            $table->string('email', 32);
            $table->text('maps')->nullable();
            $table->text('link_facebook')->nullable();
            $table->text('link_instagram')->nullable();
            $table->text('link_twitter')->nullable();
            $table->text('link_youtube')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utilities');
    }
}
