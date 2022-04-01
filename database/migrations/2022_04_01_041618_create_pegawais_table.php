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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pangkat_id');
            $table->string('nama');
            $table->bigInteger('nip');
            $table->text('pangkat');
            $table->timestamp('tmt_pangkat')->nullable();
            $table->text('jabatan');
            $table->string('jenis_jabatan');
            $table->timestamp('tmt_jabatan')->nullable();
            $table->text('email');
            $table->string('slug')->unique();
            $table->boolean('is_admin')->default(false);
            $table->timestamps();
        });
    }

    // * Template Insert Data *
    // Pegawai::create([
    //     'nama' => 'Muhammad Ammar Nabil',
    //     'pegawai_id' => 3,
    //     'nip' => '146956569769566964',
    //     'pangkat' => 'Pembina Tk. IX/ III A',
    //     'tmt_pangkat' => '2020-01-01',
    //     'jabatan' => 'Analisis Data Kedua',
    //     'jenis_jabatan' => 'Administrator',
    //     'tmt_jabatan' => '2020-01-01',
    //     'email' => 'ammar@bpmpk.gov.id',
    //     'slug' => 'ammar-nabil',
    //     'is_admin' => false
    // ])

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawais');
    }
};
