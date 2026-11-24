<?php
 
namespace Database\Seeders;
 
use App\Models\User;
use Illuminate\Database\Seeder;
 
class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Akun petugas perpustakaan (admin)
        User::create([
            'name'     => 'Admin SiPerdu',
            'email'    => 'admin@siperdu.test',
            'password' => 'password',   // otomatis di-hash oleh cast 'hashed' pada Model User
            'role'     => 'admin',
        ]);
 
        // Akun anggota perpustakaan (user biasa)
        User::create([
            'name'     => 'Budi Anggota',
            'email'    => 'user@siperdu.test',
            'password' => 'password',
            'role'     => 'user',
        ]);
    }
}
