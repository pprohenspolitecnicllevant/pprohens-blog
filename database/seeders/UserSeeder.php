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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Jaume',
            'email' => 'jaume@laravel.com',
            'password' => Hash::make('12345678'),
        ]);

        User::factory()->create([
            'name' => 'Pere',
            'email' => 'pere@laravel.com',
            'password' => Hash::make('12345678'),
        ]);

        User::factory()->create([
            'name' => 'Toni',
            'email' => 'toni@laravel.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
