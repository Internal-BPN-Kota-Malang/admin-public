<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Buat (atau perbarui) akun admin pertama.
     *
     * Pakai updateOrCreate supaya aman dijalankan berkali-kali —
     * kalau emailnya sudah ada, datanya di-update (bukan bikin duplikat).
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name'     => 'Admin',
                'password' => bcrypt('123'),
                'role'     => 'admin',
            ]
        );
    }
}