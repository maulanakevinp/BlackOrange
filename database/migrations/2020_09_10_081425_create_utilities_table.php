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
            $table->text('nama_website');
            $table->text('logo');
            $table->text('nama_perusahaan');
            $table->text('alamat_perusahaan');
            $table->text('tentang_kami');
            $table->string('nomor_telepon', 16);
            $table->string('nomor_whatsapp', 16);
            $table->string('email', 30);
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
