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
        Schema::create('jenis_jabatans', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->unique();
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    // JenisJabatan::create([
    //     'nama' => 'Administrator',
    //     'slug' => 'administrator',
    // ])
    // JenisJabatan::create([
    //     'nama' => 'Fungsional',
    //     'slug' => 'fungsional',
    // ])
    // JenisJabatan::create([
    //     'nama' => 'Pelaksana',
    //     'slug' => 'pelaksana',
    // ])

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis_jabatans');
    }
};
