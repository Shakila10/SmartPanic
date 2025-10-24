<?php

namespace App\Http\Controllers;

use App\Events\LaporanCreated;
use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        // untuk admin: daftar semua laporan
        $laporans = Laporan::latest()->paginate(10);
        return view('laporan.index', compact('laporans'));
    }

    public function create()
    {
        return view('laporan.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_pelapor' => 'nullable|string|max:255',
            'jenis' => 'required|string',
            'lokasi' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $laporan = Laporan::create($data);

        // broadcast event
        broadcast(new LaporanCreated($laporan))->toOthers();

        return redirect()->route('laporan.thanks')->with('success','Laporan terkirim.');
    }

    public function show(Laporan $laporan)
    {
        return view('laporan.show', compact('laporan'));
    }

    public function updateStatus(Request $request, Laporan $laporan)
    {
        $request->validate(['status' => 'required|in:Baru,Proses,Selesai']);
        $laporan->update(['status' => $request->status]);
        return back()->with('success','Status diperbarui.');
    }

    public function thanks()
    {
        return view('laporan.thanks');
    }
}
