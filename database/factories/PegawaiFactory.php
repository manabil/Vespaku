<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pegawai>
 */
class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nama = $this->faker->name();
        $nama_clean = strtolower(str_replace('.','', str_replace(' ', '-', $nama)));

        return [
            'nama' => $nama,
            'nip' => $this->faker->unique()->creditCardNumber(),
            'username' => $nama_clean,
            'password' => $this->faker->password(),
            'email' => $nama_clean . '@bpmpk.gov.id',
            'tanggal_lahir' => now(),
            'is_admin' => $this->faker->boolean(20)
        ];
    }
}
