<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use Illuminate\Support\Facades\Http;

class LaporanController extends Controller
{
    // 🟢 Tampilkan form tambah laporan
    public function create()
    {
        return view('dashboardRT.tambah-laporan');
    }

    // 🟢 Tampilkan daftar/riwayat laporan
    public function riwayat()
    {
        // Ambil semua laporan dari database (paling baru di atas)
        $laporans = Laporan::orderBy('created_at', 'desc')->get();

        // Kirim data laporan ke view riwayat-laporan.blade.php
        return view('dashboardRT.riwayat-laporan', compact('laporans'));
    }

    // 🟢 Simpan laporan baru dari form tambah-laporan
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'jenis_laporan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'foto_kejadian' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        // Jika ada foto, simpan ke storage/public/laporan_foto
        if ($request->hasFile('foto_kejadian')) {
            $path = $request->file('foto_kejadian')->store('laporan_foto', 'public');
            $data['foto_kejadian'] = $path;
        }

        // Tambahkan status default
        $data['status'] = 'Menunggu Verifikasi';

        // Simpan laporan ke database
        $laporan = Laporan::create($data);

        // Kirim notifikasi WhatsApp ke user lain
        $this->kirimNotifikasiWA($laporan);

        // Redirect kembali ke halaman sebelumnya dengan popup sukses
        return redirect()->back()->with('success', 'Laporan berhasil dikirim!');
    }

    // 🟢 Fungsi kirim notifikasi ke WhatsApp via API Fonnte
    private function kirimNotifikasiWA($laporan)
    {
        // Nomor tujuan (format internasional, tanpa 0 di depan)
        $targets = [
            '6281234567890', // contoh nomor user 1
            '6289876543210', // contoh nomor user 2
            // tambahkan sesuai kebutuhan
        ];

        // Isi pesan WA
        $message = "🚨 *Laporan Baru Diterima!*\n\n"
            . "👤 Pelapor: {$laporan->nama_pelapor}\n"
            . "📋 Jenis: {$laporan->jenis_laporan}\n"
            . "📍 Lokasi: {$laporan->lokasi}\n"
            . "📝 Deskripsi: {$laporan->deskripsi}\n"
            . "📊 Status: {$laporan->status}\n\n"
            . "Segera cek dashboard RT untuk detail lengkap.";

        // Kirim pesan ke setiap target menggunakan Fonnte API
        foreach ($targets as $target) {
            Http::withHeaders([
                'Authorization' => env('FONNTE_TOKEN'),
            ])->asForm()->post('https://api.fonnte.com/send', [
                'target' => $target,
                'message' => $message,
            ]);
        }
    }
}
