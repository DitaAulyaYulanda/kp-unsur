<?php

namespace Database\Seeders;

use App\Models\Fasilitas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateFasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fasilitas = [
            [
                'nama' => 'Lab Komputer',
                'photo' => 'photo_fasilitas_1685928784.jpg',
                'deskripsi' => 'Di lab ini terdapat 12 komputer',
                'jumlah' => '1',
                'kondisi' => 'Bagus',
                'lokasi' => 'Di sebelah kelas XII',
                'penggunaan' => 'Untuk praktikum'
            ]
        ];

        foreach ($fasilitas as $key => $value) {
            Fasilitas::create($value);
        }
    }
}
