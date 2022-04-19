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
        $nama_clean = strtolower(str_replace('.','', str_replace(' ', '-', $nama)));

        return [
            'nama' => $nama,
            'nip' => $this->faker->unique()->creditCardNumber(),
            'username' => $nama_clean,
            'password' => bcrypt('12345'),
            'email' => $nama_clean . '@bpmpk.gov.id',
            'tanggal_lahir' => now(),
            'is_admin' => $this->faker->boolean(20),
            'foto' => '',
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
