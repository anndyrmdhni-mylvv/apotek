<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin NindyaFarma',
                'email' => 'admin@mail.com',
                'password' => Hash::make('123'),
            ],
            [
                'name' => 'Apoteker Nindya',
                'email' => 'apoteker@mail.com',
                'password' => Hash::make('123'),
            ],
            [
                'name' => 'Gudang Nindya',
                'email' => 'gudang@mail.com',
                'password' => Hash::make('123'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
