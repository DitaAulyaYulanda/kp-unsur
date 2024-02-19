<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateGurusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $guru = [
            [
                'name' => 'Marwa',
                'photo' => 'photo_guru_1686240775.png',
                'deskripsi' => 'Guru SMKN 1 Cipanas sudah 2 tahun',
                'pendidikan' => 'S1 Pendidikan',
                'pengalaman' => 'Pernah menjadi guru sd',
                'mata_pelajaran' => 'Guru Matematika',
                'email' => 'marwa.gmail.com'
            ]
        ];

        foreach ($guru as $key => $value) {
            Guru::create($value);
        }
    }
}
