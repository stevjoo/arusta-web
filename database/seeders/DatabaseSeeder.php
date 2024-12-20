<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'role' => '1',
            'password' => '12345678',
        ]);

        User::factory()->create([
            'name' => 'user',
            'email' => 'user@example.com',
            'role' => '2',
            'password' => '12345678',
        ]);

        User::factory()->create([
            'name' => 'user2',
            'email' => 'user2@example.com',
            'role' => '2',
            'password' => '12345678',
        ]);
    }
}
