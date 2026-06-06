<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $jenis = $request->jenis_surat;
        $tanggalMulai = $request->tanggal_mulai;
        $tanggalSelesai = $request->tanggal_selesai;

        $data = collect();

        if (
            $jenis &&
            $tanggalMulai &&
            $tanggalSelesai
        ) {

            if ($jenis == 'masuk') {

                $data = SuratMasuk::whereBetween(
                    'tanggal_surat',
                    [$tanggalMulai, $tanggalSelesai]
                )
                    ->latest()
                    ->get();
            } elseif ($jenis == 'keluar') {

                $data = SuratKeluar::whereBetween(
                    'tanggal_surat',
                    [$tanggalMulai, $tanggalSelesai]
                )
                    ->latest()
                    ->get();
            }
        }

        return view('laporan.index', compact(
            'data',
            'jenis',
            'tanggalMulai',
            'tanggalSelesai'
        ));
    }
}
