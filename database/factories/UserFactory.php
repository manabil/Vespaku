<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nama = $this->faker->name();
        $nama_clean = strtolower(str_replace(['.', ' '], ['', '-'], $nama));
        $username = str_replace('/', '-', openssl_encrypt($nama_clean, 'AES-128-ECB', 'VESPaKU'));

        $user_type = ['super_admin', 'admin', 'user'];

        return [
            'nama' => $nama,
            'nip' => $this->faker->unique()->creditCardNumber(),
            'username' => $username,
            'password' => bcrypt('12345'),
            'email' => $nama_clean . '@bpmpk.gov.id',
            'tanggal_lahir' => now(),
            'user_type' => $this->faker->randomElement($user_type),
            'foto' => 'foto_profile/default.png',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
