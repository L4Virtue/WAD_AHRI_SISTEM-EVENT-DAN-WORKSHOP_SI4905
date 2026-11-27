<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::updateOrCreate(
            ['username' => 'admin'],
            [
                'password' => Hash::make('password'),
    public function run(): void
    {
        User::updateOrCreate(
            ['username' => 'admin'],
            [
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['username' => 'panitia'],
            [
                'password' => Hash::make('password'),
                'role' => 'panitia',
            ]
        );
        User::firstOrCreate(
            ['username' => 'petugas'],
            [
                'password' => Hash::make('petugas123'),
                'role' => 'petugas',
            ]
        );
        
    }
}
