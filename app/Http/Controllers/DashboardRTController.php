<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;

class DashboardRTController extends Controller
{
    // Menampilkan form tambah laporan
    public function tambahLaporan()
    {
        return view('dashboardRT.tambah-laporan');
    }

    // Menyimpan laporan baru
    public function simpanLaporan(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        $laporan = new Laporan();
        $laporan->judul = $request->judul;
        $laporan->kategori = $request->kategori;
        $laporan->deskripsi = $request->deskripsi;

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('laporan', 'public');
            $laporan->foto = $path;
        }

        $laporan->save();

        return redirect('/dashboardRT')->with('success', 'Laporan berhasil dikirim!');
    }
}
