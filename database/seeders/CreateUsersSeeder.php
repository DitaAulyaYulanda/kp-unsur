<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Staff',
                'nisn' => '552011907',
                'email' => 'admin1@mail.com',
                'password' => bcrypt('12345'),
                'roles_id' => 1
            ],
            [
                'name' => 'Alumni',
                'nisn' => '552011907',
                'email' => 'alumni@mail.com',
                'password' => bcrypt('12345'),
                'roles_id' => 2
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
