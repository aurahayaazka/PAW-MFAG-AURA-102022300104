<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');

        $nama = "Praktikan EAD";
        $jam = date('H');
        $waktu = date('H:i:s');
        $tanggal = $this->getTanggal();

        $salam = match (true) {
            $jam >= 5 && $jam < 12 => 'Selamat Pagi',
            $jam >= 12 && $jam < 15 => 'Selamat Siang',
            $jam >= 15 && $jam < 18 => 'Selamat Sore',
            default => 'Selamat Malam',
        };

        return view('dashboard', compact('nama', 'salam', 'waktu', 'tanggal'));
    }

    private function getTanggal()
    {
        return date('d-m-Y');
    }
}
