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
        Schema::create('jabatans', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->unique();
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    // * Template Insert Data *
    // Jabatan::create([
    //     'nama' => 'Sekretaris Utama',
    //     'slug' => 'sekretaris-utama',
    // ])
    // Jabatan::create([
    //     'nama' => 'Bendaraha Pembantu',
    //     'slug' => 'bendaraha-pembantu',
    // ])
    // Jabatan::create([
    //     'nama' => 'Ketua Pelaksana',
    //     'slug' => 'ketua-pelaksana',
    // ])

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jabatans');
    }
};
