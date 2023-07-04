<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormatursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formaturs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('ttl')->nullable();
            $table->string('asal')->nullable();
            $table->string('bidang')->nullable();
            $table->string('telp')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('riwayat')->nullable();
            $table->string('visi')->nullable();
            $table->string('misi')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('formaturs');
    }
}
