<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    // endpoint untuk chart data
    public function chartData()
    {
        $data = Laporan::selectRaw('jenis, COUNT(*) as total')
                       ->groupBy('jenis')
                       ->pluck('total','jenis');

        return response()->json($data);
    }
}
