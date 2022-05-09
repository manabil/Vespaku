<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Str;

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
        $action = ['proses', 'terima', 'tolak'];
        $peminta = $users->random()->id;
        $valid_id = array_diff($users->pluck('id')->toArray(), [$peminta]);
        $pemberi = $valid_id[array_rand($valid_id)];
        $aksi = $this->faker->randomElement($action);
        $is_downloaded = ($aksi === 'terima') ? $this->faker->boolean(40) : false;
        
        return [
            'user_id' => $peminta,
            'owner' => $pemberi,
            'request_file' => 'surat_keterangan',
            'tanggal_aksi' => $this->faker->dateTimeInInterval('-1 years', '+7 days'),
            'aksi' => $aksi,
            'token' => ($aksi === 'terima') ? Str::random(20) : '',
            'is_downloaded' => $is_downloaded
        ];
    }
}
