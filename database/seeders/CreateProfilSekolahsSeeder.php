<?php

namespace Database\Seeders;

use App\Models\Profilsekolah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateProfilSekolahsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sekolah = [
            [
                'nama' => 'SMKN 1 CIPANAS',
                'alamat' => 'Jl. Cipanas',
                'visi' => 'Menjadi sekolah yang',
                'misi' => 'Mewujudkan',
                'sejarah' => 'atysajncnjus',
                'ekstrakulikuler' => 'sgtaisgbnxjisxk',
                'no_tlp' => '08957890876',
                'email' => 'smk1cipanas.gmail.com'
            ]
        ];

        foreach ($sekolah as $key => $value) {
            Profilsekolah::create($value);
        }
    }
}
