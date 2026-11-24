<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Urutan penting:
        // 1. Kategori harus dibuat terlebih dahulu
        // 2. Buku membutuhkan data kategori
        // 3. User untuk akun Admin dan User
        $this->call([
            KategoriSeeder::class,
            BukuSeeder::class,
            UserSeeder::class,
        ]);
    }
}