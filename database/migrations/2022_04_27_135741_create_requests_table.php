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

        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('owner');
            $table->string('request_file');
            $table->dateTime('tanggal_aksi');
            $table->string('aksi');
            $table->string('token', 20)->nullable();
            $table->string('surat_keterangan', 100)->nullable();
            $table->string('slug', 75)->nullable();
            $table->boolean('is_downloaded');
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
        Schema::dropIfExists('requests');
    }
};
