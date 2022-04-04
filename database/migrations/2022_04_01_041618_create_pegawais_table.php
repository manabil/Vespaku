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
            $table->foreignId('jabatan_id');
            $table->foreignId('jenis_jabatan_id');
            $table->string('nama');
            $table->bigInteger('nip');
            $table->timestamp('tmt_pangkat')->nullable();
            $table->timestamp('tmt_jabatan')->nullable();
            $table->text('email');
            $table->string('slug')->unique();
            $table->boolean('is_admin')->default(false);
            $table->timestamps();
        });
    }

    // * Template Insert Data *
    // Pegawai::create([
    //     'nama' => 'Bagas Mahmudi',
    //     'pangkat_id' => 2,
    //     'jabatan_id' => 2,
    //     'jenis_jabatan_id' => 2,
    //     'nip' => '14695651235066964',
    //     'pangkat' => 'Pembina Tk. IX/ XI A',
    //     'tmt_pangkat' => '2020-01-01',
    //     'jabatan' => 'Departemen Kepegawaian',
    //     'jenis_jabatan' => 'Fungsional',
    //     'tmt_jabatan' => '2020-01-01',
    //     'email' => 'bagas@bpmpk.gov.id',
    //     'slug' => 'bagas-mahmudo',
    //     'is_admin' => true
    // ]);
    // Pegawai::create([
    //     'nama' => 'Alexander Muhammad',
    //     'pangkat_id' => 2,
    //     'jabatan_id' => 2,
    //     'jenis_jabatan_id' => 2,
    //     'nip' => '14695652350166964',
    //     'pangkat' => 'Pembina Tk. XII/ I C',
    //     'tmt_pangkat' => '2020-01-01',
    //     'jabatan' => 'Sekretaris',
    //     'jenis_jabatan' => 'Admnistrator',
    //     'tmt_jabatan' => '2020-01-01',
    //     'email' => 'alexander@bpmpk.gov.id',
    //     'slug' => 'alexander-muhammad',
    //     'is_admin' => false
    // ]);
    // Pegawai::create([
    //     'nama' => 'Malik Ibrahim',
    //     'pangkat_id' => 1,
    //     'jabatan_id' => 1,
    //     'jenis_jabatan_id' => 1,
    //     'nip' => '14695652350166964',
    //     'pangkat' => 'Pembina Tk. II/ I C',
    //     'tmt_pangkat' => '2020-01-01',
    //     'jabatan' => 'Bendahara',
    //     'jenis_jabatan' => 'Fungsional',
    //     'tmt_jabatan' => '2020-01-01',
    //     'email' => 'malik@bpmpk.gov.id',
    //     'slug' => 'malik-ibrahim',
    //     'is_admin' => false
    // ]);
    // Pegawai::create([
    //     'nama' => 'Josephine Anastya',
    //     'pangkat_id' => 3,
    //     'jabatan_id' => 3,
    //     'jenis_jabatan_id' => 3,
    //     'nip' => '14695652350166964',
    //     'pangkat' => 'Pembina Tk. III/ VI C',
    //     'tmt_pangkat' => '2020-01-01',
    //     'jabatan' => 'Sekretaris',
    //     'jenis_jabatan' => 'Admnistrator',
    //     'tmt_jabatan' => '2020-01-01',
    //     'email' => 'josephine@bpmpk.gov.id',
    //     'slug' => 'josephine-anastya',
    //     'is_admin' => false
    // ]);
    // Pegawai::create([
    //     'nama' => 'Abdul Kadek',
    //     'pangkat_id' => 3,
    //     'jabatan_id' => 3,
    //     'jenis_jabatan_id' => 3,
    //     'nip' => '14695652350166964',
    //     'pangkat' => 'Pembina Tk. IX/ I C',
    //     'tmt_pangkat' => '2020-01-01',
    //     'jabatan' => 'Manajer Projek',
    //     'jenis_jabatan' => 'Pelaksana',
    //     'tmt_jabatan' => '2020-01-01',
    //     'email' => 'abdul@bpmpk.gov.id',
    //     'slug' => 'abdul-kadek',
    //     'is_admin' => false
    // ]);

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
