<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\DataguruSeeder; // Pastikan seeder sudah diimport

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil seeder lainnya
        $this->call([
            DataguruSeeder::class,  // Pastikan DataguruSeeder dipanggil di sini
            // Seeder lain jika diperlukan
        ]);

        // Membuat user admin (opsional)
        $user = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
        ]);

        // Assign role ke user admin
        $user->assignRole('super_admin'); // Pastikan role ini sudah ada
    }
}
