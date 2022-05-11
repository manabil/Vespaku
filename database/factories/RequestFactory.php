<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PangkatUser;
use App\Models\Pangkat;
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
        $user_id = $users->random()->id;
        $valid_id = array_diff($users->pluck('id')->toArray(), [$user_id]);
        $owner = $valid_id[array_rand($valid_id)];
        $aksi = $this->faker->randomElement(['proses', 'terima', 'tolak']);
        $is_downloaded = ($aksi === 'terima') ? $this->faker->boolean(40) : false;
        $pangkat = Pangkat::all()->pluck('nama')->toArray();

        return [
            'user_id' => $user_id,
            'owner' => $owner,
            'request_file' => $pangkat[array_rand($pangkat)],
            'tanggal_aksi' => $this->faker->dateTimeInInterval('-1 years', '+7 days'),
            'aksi' => $aksi,
            'token' => ($aksi === 'terima') ? Str::random(20) : '',
            'surat_keterangan' => PangkatUser::where('user_id', $owner)->first()->surat_keterangan,
            'slug' => PangkatUser::where('user_id', $owner)->first()->slug,
            'is_downloaded' => $is_downloaded
        ];
    }
}
