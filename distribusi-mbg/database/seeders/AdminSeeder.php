<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Buat akun admin default untuk aplikasi Produksi MBG.
     */
    public function run(): void
    {
        // Cek apakah admin sudah ada, hindari duplikasi
        User::firstOrCreate(
            ['email' => 'admin@mbg.com'],
            [
                'name'     => 'Administrator MBG',
                'email'    => 'admin@mbg.com',
                'password' => Hash::make('admin123'),
            ]
        );
    }
}
