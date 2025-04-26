<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('mahasiswa')->insert([
            [
                'nama' => 'Rizky Ramadhan',
                'nim' => '2101001',
                'email' => 'rizky@example.com',
                'jurusan' => 'Teknik Informatika',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
