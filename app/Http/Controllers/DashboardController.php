<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Memo;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSuratMasuk = SuratMasuk::count();
        $totalSuratKeluar = SuratKeluar::count();
        $totalMemo = Memo::count();

        $totalLaporan = $totalSuratMasuk + $totalSuratKeluar;

        $suratMasukBulanIni = SuratMasuk::whereMonth('tanggal_surat', Carbon::now()->month)
            ->whereYear('tanggal_surat', Carbon::now()->year)
            ->count();

        $suratKeluarBulanIni = SuratKeluar::whereMonth('tanggal_surat', Carbon::now()->month)
            ->whereYear('tanggal_surat', Carbon::now()->year)
            ->count();

        $memoBulanIni = Memo::whereMonth('tanggal', Carbon::now()->month)
            ->whereYear('tanggal', Carbon::now()->year)
            ->count();

        return view('dashboard', compact(
            'totalSuratMasuk',
            'totalSuratKeluar',
            'totalMemo',
            'totalLaporan',
            'suratMasukBulanIni',
            'suratKeluarBulanIni',
            'memoBulanIni'
        ));
    }
}
