<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $userData = [
                [
                    'name' => 'user',
                    'email' => 'user@gmail.com',
                    'role' => 'user',
                    'password' => bcrypt('123456'),
                ],
                [
                    'name' => 'admin',
                    'email' => 'admin@gmail.com',
                    'role' => 'admin',
                    'password' => bcrypt('admin123'),
                ],
                [
                    'name' => 'superadm',
                    'email' => 'superadm@gmail.com',
                    'role' => 'superadm',
                    'password' => bcrypt('superadmin123'),
                ],            
        ];


        foreach ($userData as $key => $val) {
            // Periksa apakah data sudah ada sebelum mencoba membuatnya
            if (!User::where('email', $val['email'])->exists()) {
                User::create($val);
            }
        }
    }
}
