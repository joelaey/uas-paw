<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin Utama',
            'nik' => '1234567890123456',
            'phone' => '081234567890',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Create Test User
        User::create([
            'name' => 'Jamal Khumar',
            'nik' => '9876543210123456',
            'phone' => '089756237943',
            'email' => 'jamal@mail.com',
            'password' => Hash::make('user123'),
            'role' => 'user',
        ]);

        // Create sample aspirations for test user
        $user = User::where('email', 'jamal@mail.com')->first();

        $user->aspirations()->createMany([
            [
                'title' => 'Jalan Rusak di Kelurahan Cimencang',
                'location' => 'Jl. Raya Cimencang No. 45',
                'content' => 'Jalan di depan kelurahan sudah rusak parah, banyak lubang yang membahayakan pengendara motor. Mohon segera diperbaiki.',
                'status' => 'baru',
            ],
            [
                'title' => 'Lampu Jalan Mati di Kecamatan Cibiru',
                'location' => 'Jl. A. H Nasution Cibiru No.102',
                'content' => 'Lampu jalan di sepanjang jalan ini sudah mati selama 2 minggu. Sangat gelap dan berbahaya pada malam hari.',
                'status' => 'diproses',
            ],
            [
                'title' => 'Pembuangan Sampah Sembarangan ke Sungai',
                'location' => 'Sungai Cikapundung, Dago',
                'content' => 'Banyak warga yang membuang sampah ke sungai. Sungai menjadi kotor dan bau. Mohon ada penertiban.',
                'status' => 'selesai',
            ],
        ]);
    }
}
