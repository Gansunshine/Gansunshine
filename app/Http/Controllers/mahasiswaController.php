<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;



class mahasiswaController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     {
        $response = Http::withoutVerifying()->get('http://192.168.5.16:7095/api/v1/Siswa/GetSiswa');

        // Jika status response adalah 200 (OK), ambil data JSON
        if ($response->ok()) {
            $siswa = $response->json();

            return view('mahasiswaIndex', compact('siswa'));
        }

        // Jika tidak, tampilkan pesan error
        return response()->json(['error' => 'Failed to retrieve data from the API'], $response->status());

    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $baseurl = 'http://192.168.5.16:7095/api/v1/Siswa/InputSiswa';

        $data = [
            'id' => $request->id,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kelas' => $request->kelas,
            'alamat' => $request->alamat
        ];

        $insertproduk = Http::withoutVerifying()
        ->withHeaders([])
        ->post($baseurl,$data);

        if ($insertproduk->successful()) {
            // Jika permintaan berhasil
            return redirect('mahasiswa');
        } else {
            // Jika permintaan gagal
            echo "ah gamasukk mas";
            //return response()->json(['message' => 'Gagal menambahkan data'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        {
            $baseurl = 'http://192.168.5.16:7095/api/v1/Siswa/UpdateSiswa';

            $data = [
                'id' => $request->id_siswaMod,
                'nama' => $request->nama_siswaMod,
                'jenis_kelamin' => $request->jk_siswaMod,
                'kelas' => $request->kelas_siswaMod,
                'alamat' => $request->alamat_siswaMod,
                 ];

            $siswa = Http::withHeaders([])

            ->put($baseurl,$data);

            if ($siswa->successful()) {
                // Jika permintaan berhasil
                return redirect('mahasiswa');
            } else {
                // Jika permintaan gagal
                return response()->json(['message' => 'Gagal menambahkan data'], 500);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        {
            $baseurl = 'http://192.168.5.16:7095/api/v1/Siswa/DeleteSiswa/' . $id;

            $response = Http::withoutVerifying()->delete($baseurl);

            if ($response->successful()) {
                // Jika permintaan berhasil
                return redirect('mahasiswa')->with('success', 'Data siswa berhasil dihapus');
            } else {
                // Jika permintaan gagal
                return redirect('mahasiswa')->with('error', 'Gagal menghapus data siswa');
            }
        }
    }
}
