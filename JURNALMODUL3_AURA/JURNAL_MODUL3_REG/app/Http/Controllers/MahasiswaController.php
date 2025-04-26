<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        // ==================2==================
        // - Buat object mahasiswa dengan data dummy (nama, nim, email, jurusan, fakultas, foto)
        // - Kirim object tersebut ke view 'profil'

        $mahasiswa = (object)   [
            'nama' => 'Aura',
            'nim' => '102022300104',
            'email' => 'myaura.haya.azka@gmail.com',
            'jurusan' => 'S1 Sistem Informasi',
            'fakultas' => 'Rekayasa Industri',
            'foto' => ''
        ];
        return view('profil', ['mahasiswa' => $mahasiswa]);
    }
}

