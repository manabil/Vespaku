<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use App\Models\JenisJabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Pangkat;
use App\Models\Request;
use App\Models\JabatanUser;
use App\Models\PangkatUser;
use Illuminate\Support\Arr;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create();

        //*=====================
        //* Pegawai Seeder
        //*=====================
        User::factory(25)->create();


        //*=====================
        //* Pangkat Seeder
        //*=====================
        $pangkats = [
            'CPNS',
            'Pengatur Muda / II A',
            'Pengatur Muda Tk I / II B',
            'Pengatur / II C',
            'Pengatur Tk I / II D',
            'Penata Muda / III A',
            'Penata Muda Tk I / III B',
            'Penata / III C',
            'Penata Tk I / III D',
            'Pembina / IV A',
            'Pembina Tk I / IV B',
            'Pembina Utama Muda / IV C',
            'Pembina Utama Madya / IV D',
            'Pembina Utama / IV E'
        ];

        foreach ($pangkats as $pangkat) {
            Pangkat::create([
                'nama' => $pangkat,
                'slug' => strtolower(str_replace(' ', '-', str_replace(' / ', '-', $pangkat)))
            ]);
        }


        //*=====================
        //* Jenis Jabatan Seeder
        //*=====================
        $jenis_jabatans = [
            'Administrator',
            'Pelaksana',
            'Fungsional',
        ];

        foreach ($jenis_jabatans as $jabatan) {
            JenisJabatan::create([
                'nama' => $jabatan,
                'slug' => strtolower($jabatan)
            ]);
        }


        //*=====================
        //* Jabatan Seeder
        //*=====================
        $jabatans = [
            'Kepala',
            'Kassubag TU',
            'Analis Anggaran Ahli Pertama',
            'Analis SDM Aparatur Ahli Pertama',
            'Analis Pengelolaan Keuangan APBN Ahli Pertama',
            'Arsiparis Ahli Pertama',
            'Arsiparis Penyelia',
            'Pranata Keuangan APBN Mahir',
            'Pranata Laksana Barang Terampil',
            'Arsiparis Mahir',
            'Penyusun Program Anggaran dan Pelaporan',
            'Bendara',
            'Analis Sistem Informasi dan Jaringan',
            'Analis Tata Laksana',
            'Analis Pemanfaatan Teknologi',
            'Pengolah Bahan Informasi dan Publikasi',
            'Pengelola Keuangan',
            'Verifikator Keuangan',
            'Pengelola Kepegawaian',
            'Pengelola Barang Milik Negara',
            'Teknisi Produksi Multimedia dan Web',
            'Teknisi Sarana dan Prasarana',
            'Pengadministrasi Rumah Tangga dan Produksi',
            'Pengadministrasi Umum',
            'Pengadministrasi Keuangan',
            'Pengadministrasi Sarana dan Prasarana',
            'Pengadministrasi Kepegawaian',
            'Pengadministrasi Persuratan',
            'Pengadministrasi Barang Milik Negara',
            'Pranata Komputer Ahli Pertama',
            'Pranata Komputer Ahli Muda',
            'Pranata Komputer Penyelia',
            'Pengembangan Teknologi Pembelajaran Ahli Pertama',
            'Pengembangan Teknologi Pembelajaran Ahli Muda',
            'Pengembangan Teknologi Pembelajaran Ahli Madya',
        ];

        foreach ($jabatans as $jabatan) {
            Jabatan::create([
                'nama' => $jabatan,
                'slug' => strtolower(str_replace(' ', '-', $jabatan)),
            ]);
        }

        //*===============================
        //* Jabatan/Pangkat Pegawai Seeder
        //*===============================
        foreach (User::all() as $pegawai) {
            $pegawai->pangkat()->attach(Pangkat::all()->random());
            $pegawai->jabatan()->attach(Jabatan::all()->random());
        }

        //*=====================
        //* Jenis Jabatan Seeder
        //*=====================
        foreach (JabatanUser::all() as $jabatan) {
            $jabatan->update([
                'jenis_jabatan_id' => JenisJabatan::all()->random()->id,
                'tmt' => $this->faker->dateTimeBetween('-10 years', 'now'),
                'slug' => str_replace(['/', '.'], '', bcrypt(str_replace(['-', ' ', ':', '.'], '', $this->faker->dateTimeBetween('-1 years', 'now')->format('Y-m-d H:i:s')))),
                'created_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
                'updated_at' => $this->faker->dateTimeInInterval('-1 years', '1 weeks'),
            ]);
        }

        //*===========================
        //* Pangkat timestamps Seeder
        //*===========================
        foreach (PangkatUser::all() as $pangkat) {
            $pangkat->update([
                'tmt' => $this->faker->dateTimeBetween('-10 years', 'now'),
                'slug' => str_replace(['/', '.'], '', bcrypt(str_replace(['-', ' ', ':', '.'], '', $this->faker->dateTimeBetween('-1 years', 'now')->format('Y-m-d H:i:s')))),
                'created_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
                'updated_at' => $this->faker->dateTimeInInterval('-1 years', '1 weeks'),
            ]);
        }

        //*===========================
        //* Request Seeder
        //*===========================
        Request::factory(150)->create();
    }
}
