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
        Schema::create('pangkat_pegawai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawai_id')->constrained();
            $table->foreignId('pangkat_id')->constrained();
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
        Schema::dropIfExists('pangkat_pegawais');
    }
};
