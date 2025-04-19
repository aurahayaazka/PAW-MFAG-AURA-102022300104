<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // ==================2==================
        // - Set timezone ke Asia/Jakarta
        // - Buat variabel nama, jam, waktu
        // - Tentukan $salam berdasarkan jam (pagi, siang, sore, malam)
        // - Panggil fungsi getTanggal()
        // - Kirim data ke view 'dashboard'
        date_default_timezone_set('Asia/Jakarta');

        $nama = 'Aura Haya Azka';
        $jam = date('H:i:s');
        $salam = match (true) {
            $jam >= 5 && $jam < 12 => 'Selamat Pagi',
            $jam >= 12 && $jam < 15 => 'Selamat Siang',
            $jam >= 15 && $jam < 18 => 'Selamat Sore',
            default => 'Selamat Malam'
        };

        $tanggal = $this->getTanggal();
 
        return view('dashboard', compact('nama', 'salam', 'jam', 'tanggal'));
    }

    private function getTanggal()
    {
        // Kembalikan tanggal sekarang dalam format dd-mm-yyyy
        return date('d-m-Y');
    }
}
