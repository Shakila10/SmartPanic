<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;

class LaporanController extends Controller
{
    // Tampilkan form tambah laporan
    public function create()
    {
        return view('dashboardRT.tambah-laporan');
    }

    // Simpan laporan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'jenis_laporan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:255',
        ]);

        Laporan::create($request->all());

        return redirect()->back()->with('success', 'Laporan berhasil dikirim!');
    }
}
