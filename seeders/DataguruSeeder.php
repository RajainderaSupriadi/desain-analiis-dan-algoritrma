<?php

namespace Database\Seeders;

use App\Models\Dataguru;
use Illuminate\Database\Seeder;

class DataguruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Menambahkan data guru
        Dataguru::create([
            'nama' => 'Pak Ijah',
            'nip' => '1001',
            'alamat' => 'Jayanti',
            'telepon' => '08001',
            'mata_pelajaran' => 'Agama',
            'jenis_kelamin' => 'L',
            'tanggal_lahir' => '2001-01-01',
            'status' => 'aktif',
        ]);
        
        // Anda bisa menambahkan lebih banyak data di sini jika diperlukan
    }
}
