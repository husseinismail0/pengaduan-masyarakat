<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $users = [
            [
                'username' => 'admin123',
                'password' => Hash::make('admin123'),
                'phone' => '57423455',
                'role' => User::ADMIN,
            ],
            [
                'username' => 'petugas123',
                'password' => Hash::make('petugas123'),
                'phone' => '12345679',
                'role' => User::PETUGAS,
            ],
        ];

        foreach ($users as $user) {
            User::factory($user)->create();
        }
    }
}
