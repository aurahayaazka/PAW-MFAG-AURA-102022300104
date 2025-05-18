<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// TODO: Import controller MahasiswaController

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

// TODO: Import model Mahasiswa, import resource MahasiswaResource

class MahasiswaController extends Controller
{
    public function index()
    {
        // TODO: Ambil semua data Mahasiswa
        $mahasiswa = mahasiswa::latest()->paginate(5);


        return new MahasiswaResource(true, 'List Data Mahasiswa', $mahasiswa);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'nim' => 'required|string|unique:mahasiswa,nim',
            'jurusan' => 'required|string',
            'fakultas' => 'required|string',
            'foto_profil' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $foto_profil = $request->file('foto_profil');
        $foto_profil->storeAs('foto_profil', $foto_profil->hashName());

        $mahasiswa = Mahasiswa::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'jurusan' => $request->jurusan,
            'fakultas' => $request->fakultas,
            'foto_profil' => $foto_profil->hashName(),
        ]);

        // TODO: Return object MahasiswaResource dengan argument (true, 'Data Mahasiswa Berhasil Ditambahkan!', $mahasiswa)
        return new MahasiswaResource(True, 'Data Mahasiswa Berhasil Ditambahkan!', $mahasiswa);
    }

    public function show($id)
    {
        // TODO: Lakukan pencarian data Mahasiswa berdasarkan id 
        $mahasiswa = mahasiswa::find($id);


        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa tidak ditemukan'], 404);
        }

        return new MahasiswaResource(true, 'Detail Data Mahasiswa!', $mahasiswa);
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);

        // TODO: Buat kondisi jika data mahasiswa tidak ditemukan maka mengembalikan 'Mahasiswa tidak ditemukan' dengan kode 404
        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa tidak ditemukan'], 404);
        }

        $validator = Validator::make($request->all(), [
            // TODO: Buat validasi untuk mengupdate data mahasiswa
            'nama' => 'required|string',
            'nim' => 'required|string|unique:mahasiswa,nim',
            'jurusan' => 'required|string',
            'fakultas' => 'required|string',
            'foto_profil' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // TODO: Buat kondisi jika tidak lulus validasi maka mengembalikan pesan error dengan kode 422
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if ($request->hasFile('foto_profil')) {

            Storage::delete('foto_profil/' . basename($mahasiswa->foto_profil));

            $foto_profil = $request->file('foto_profil');
            $foto_profil->storeAs('foto_profil', $foto_profil->hashName());

            $mahasiswa->update([
                'nama' => $request->nama,
                'nim' => $request->nim,
                'jurusan' => $request->jurusan,
                'fakultas' => $request->fakultas,
                'foto_profil' => $foto_profil->hashName(),
            ]);
        } else {

            $mahasiswa->update([
                'nama' => $request->nama,
                'nim' => $request->nim,
                'jurusan' => $request->jurusan,
                'fakultas' => $request->fakultas,
            ]);
        }

        // TODO: Return object MahasiswaResource dengan argument (true, 'Data Mahasiswa Berhasil Diubah!', $mahasiswa)
        return new MahasiswaResource(true, 'Data Mahasiswa Berhasil Diubah!', $mahasiswa);
    
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa tidak ditemukan'], 404);
        }

        // TODO: Hapus data gambar
        if ($mahasiswa->foto_profil) {
            Storage::delete('Aura profil.jpg/' . basename($mahasiswa->foto_profil));
        }

        // TODO: Hapus data mahasiswa
        $mahasiswa->delete();

        return new MahasiswaResource(true, 'Data Mahasiswa Berhasil Dihapus!', null);
    }
}


// TODO: Buat route untuk menangani request
/*    - Rute-rute terkait CRUD mahasiswa:
 *        - GET     `/mahasiswa`      → `MahasiswaController method:index`
 *        - POST    `/mahasiswa`      → `MahasiswaController method:store`
 *        - GET     `/mahasiswa/{id}` → `MahasiswaController method:show`
 *        - PUT     `/mahasiswa/{id}` → `MahasiswaController method:update`
 *        - DELETE  `/mahasiswa/{id}` → `MahasiswaController method:destroy`
 */

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::post('/mahasiswa', [MahasiswaController::class, 'store']);
Route::get('/mahasiswa/{id}', [MahasiswaController::class, 'show']);
Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update']);
Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy']);
