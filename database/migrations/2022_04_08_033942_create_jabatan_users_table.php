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
        Schema::create('jabatan_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('jabatan_id')->onDelete('cascade');
            $table->foreignId('jenis_jabatan_id')->default(1)->onDelete('cascade');
            $table->date('tmt')->default(now());
            $table->string('no_surat_keterangan', 50)->default('897.2/.201-2014');
            $table->string('surat_keterangan', 75)->default('surat_keterangan');
            $table->string('slug', 75)->default(str_replace('/', '', bcrypt(str_replace(['-',' ', ':'], '', now()->toDateTimeString()))));
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
        Schema::dropIfExists('jabatan_users');
    }
};
