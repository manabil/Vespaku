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
        Schema::create('jabatan_pegawai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawai_id')->constrained();
            $table->foreignId('jabatan_id')->constrained();
            $table->foreignId('jenis_jabatan_id')->default(1)->constrained();
            $table->year('tahun_masuk')->default(date('Y'));
            $table->text('no_surat_keterangan')->default('897.2/.201-2014');
            $table->text('surat_keterangan')->default('surat_keterangan');
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
        Schema::dropIfExists('jabatan_pegawais');
    }
};
