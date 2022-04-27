<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Request>
 */
class RequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users = User::all();
        $aksi = ['proses', 'terima', 'tolak'];
        $peminta = $users->random()->id;
        
        return [
            'user_id' => $peminta,
            'user_tujuan' => $this->faker->randomDigitNotNull($peminta),
            'request_file' => 'surat_keterangan',
            'tanggal_aksi' => now(),
            'aksi' => $this->faker->randomElement($aksi),
        ];
    }
}
