<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'),
            'level' => 'admin',
        ]);

        User::create([
            'name' => 'Staf1',
            'username' => 'staf1',
            'email' => 'staf1@gmail.com',
            'password' => Hash::make('123456'),
            'level' => 'user',
        ]);


    }
}
