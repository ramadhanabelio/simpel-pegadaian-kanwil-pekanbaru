<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            [
                'username' => 'admin',
            ],
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'email' => 'admin@pegadaian.co.id',
                'password' => 'admin@pegadaian2026',
                'profile' => null,
                'email_verified_at' => now(),
            ]
        );
    }
}
