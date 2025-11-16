<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

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

        // Kirim data laporan & daftar status ke view
        return view('dashboardRT.riwayat-laporan', compact('laporans'));
    }


    // 🟢 Simpan laporan baru dari form tambah-laporan
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'jenis_laporan' => 'required|string|max:255',
            'jenis_lainnya' => 'required_if:jenis_laporan,Lainnya|nullable|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'foto_kejadian' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        // Jika jenis laporan adalah "Lainnya", gunakan input jenis_lainnya
        if ($request->jenis_laporan === 'Lainnya' && $request->jenis_lainnya) {
            $data['jenis_laporan'] = $request->jenis_lainnya;
        }

        // Jika ada foto, simpan ke storage/public/laporan_foto
        if ($request->hasFile('foto_kejadian')) {
            $path = $request->file('foto_kejadian')->store('laporan_foto', 'public');
            $data['foto_kejadian'] = $path;
        }

        // Tambahkan status default
        $data['status'] = 'Menunggu Verifikasi';

        // Simpan laporan ke database
        $laporan = Laporan::create($data);

        // Kirim notifikasi WhatsApp ke semua user terdaftar
        $this->kirimNotifikasiWA($laporan);

        // Redirect kembali ke halaman sebelumnya dengan popup sukses
        return redirect()->back()->with('success', 'Laporan berhasil dikirim dan notifikasi telah dikirim ke warga!');
    }

    // 🟢 Update status laporan dari dropdown di dashboard RT
    public function updateStatus(Request $request, Laporan $laporan)
    {
        $request->validate([
            'status' => ['required', 'string'],
        ]);

        $laporan->status = $request->status;
        $laporan->save();

        return back()->with('success', 'Status laporan berhasil diperbarui.');
    }


    // 🟢 Fungsi kirim notifikasi ke WhatsApp via API Fonnte
    private function kirimNotifikasiWA($laporan)
    {
        try {
            // Ambil semua user yang memiliki nomor WhatsApp
            $users = User::whereNotNull('no_hp')
                ->where('no_hp', '!=', '')
                ->get();

            if ($users->isEmpty()) {
                Log::warning('Tidak ada user dengan nomor WhatsApp terdaftar');
                return;
            }

            // Generate pesan sesuai jenis insiden
            $message = $this->generateMessageTemplate($laporan);

            // Konfigurasi Fonnte
            $fonnte_token = env('FONNTE_TOKEN');

            if (!$fonnte_token) {
                Log::error('FONNTE_TOKEN tidak ditemukan di file .env');
                return;
            }

            // Kirim pesan ke setiap user
            foreach ($users as $user) {
                // Format nomor WhatsApp (pastikan format internasional)
                $target = $this->formatWhatsAppNumber($user->no_hp);

                // Kirim via Fonnte API
                $response = Http::withHeaders([
                    'Authorization' => $fonnte_token,
                ])->asForm()->post('https://api.fonnte.com/send', [
                    'target' => $target,
                    'message' => $message,
                    'countryCode' => '62', // Indonesia
                ]);

                // Log response untuk debugging
                if ($response->successful()) {
                    Log::info("Notifikasi terkirim ke {$target}", [
                        'response' => $response->json()
                    ]);
                } else {
                    Log::error("Gagal mengirim notifikasi ke {$target}", [
                        'status' => $response->status(),
                        'body' => $response->body()
                    ]);
                }
            }
        } catch (\Exception $e) {
            Log::error('Error saat mengirim notifikasi WhatsApp: ' . $e->getMessage());
        }
    }

    // 🟢 Generate template pesan sesuai jenis insiden
    private function generateMessageTemplate($laporan)
    {
        $timestamp = now()->format('d/m/Y H:i');

        // Template dasar
        $baseMessage = "🚨 *ALERT DARURAT - SMART PANIC* 🚨\n\n";

        // Template spesifik berdasarkan jenis laporan
        switch ($laporan->jenis_laporan) {
            case 'Kebakaran':
                $emoji = "🔥";
                $urgency = "*SANGAT MENDESAK!*";
                $action = "⚠️ *TINDAKAN:*\n- Jauhi area kebakaran\n- Hubungi Pemadam: *118*\n- Bantu evakuasi jika aman";
                break;

            case 'Kesehatan':
                $emoji = "🏥";
                $urgency = "*BUTUH BANTUAN MEDIS!*";
                $action = "⚠️ *TINDAKAN:*\n- Hubungi Ambulans: *113*\n- Jangan pindahkan korban kecuali perlu\n- Berikan pertolongan pertama jika mampu";
                break;

            case 'Kriminal':
                $emoji = "🚔";
                $urgency = "*WASPADA KEAMANAN!*";
                $action = "⚠️ *TINDAKAN:*\n- Hubungi Polisi: *110*\n- Jaga keselamatan diri\n- Kunci pintu dan jendela\n- Jangan dekati lokasi kejadian";
                break;

            case 'Bencana':
                $emoji = "⚡";
                $urgency = "*BAHAYA BENCANA ALAM!*";
                $action = "⚠️ *TINDAKAN:*\n- Segera ke tempat aman\n- Ikuti arahan petugas\n- Hubungi keluarga\n- Siapkan tas darurat";
                break;

            default:
                $emoji = "⚠️";
                $urgency = "*PERHATIAN!*";
                $action = "⚠️ *TINDAKAN:*\n- Tetap tenang dan waspada\n- Hubungi nomor darurat jika perlu\n- Ikuti perkembangan situasi";
                break;
        }

        // Susun pesan lengkap
        $message = $baseMessage;
        $message .= "{$emoji} *JENIS KEJADIAN:* {$laporan->jenis_laporan}\n\n";
        $message .= "{$urgency}\n\n";
        $message .= "📋 *DETAIL LAPORAN:*\n";
        $message .= "━━━━━━━━━━━━━━\n";
        $message .= "👤 *Pelapor:* {$laporan->nama_pelapor}\n";
        $message .= "📍 *Lokasi:* {$laporan->lokasi}\n";
        $message .= "⏰ *Waktu:* {$timestamp}\n";
        $message .= "📝 *Keterangan:* {$laporan->deskripsi}\n";
        $message .= "📊 *Status:* {$laporan->status}\n\n";
        $message .= "{$action}\n\n";
        $message .= "━━━━━━━━━━━━━━\n";
        $message .= "🆘 *Nomor Darurat:*\n";
        $message .= "   • Polisi: 110\n";
        $message .= "   • Ambulans: 113\n";
        $message .= "   • Pemadam: 118\n\n";
        $message .= "_Tetap tenang dan saling membantu_ 🤝";

        return $message;
    }

    // 🟢 Format nomor WhatsApp ke format internasional
    private function formatWhatsAppNumber($number)
    {
        // Hilangkan karakter non-numerik
        $number = preg_replace('/[^0-9]/', '', $number);

        // Jika diawali 0, ganti dengan 62
        if (substr($number, 0, 1) === '0') {
            $number = '62' . substr($number, 1);
        }

        // Jika belum diawali 62, tambahkan
        if (substr($number, 0, 2) !== '62') {
            $number = '62' . $number;
        }

        return $number;
    }
}
