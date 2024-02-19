<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateBeritasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $berita = [
            [
                'judul' => 'Ekstrakulikuler...',
                'users' => 1,
                'photo' => 'photo_berita_1686107673',
                'tanggal' => '2023-01-02',
                'kategori' => 'Non-Akademik',
                'isi_berita' => 'Lorem Lipsum veraygasljal,'
            ]
        ];

        foreach ($berita as $key => $value) {
            Berita::create($value);
        }
    }
}
