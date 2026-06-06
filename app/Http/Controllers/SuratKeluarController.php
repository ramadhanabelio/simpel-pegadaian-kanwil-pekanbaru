<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $suratKeluar = SuratKeluar::latest()->get();

        return view('surat-keluar.index', compact('suratKeluar'));
    }

    public function create()
    {
        return view('surat-keluar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_agenda'   => 'nullable|string|max:255',
            'nomor_surat'    => 'required|string|max:255',
            'tanggal_surat'  => 'required|date',
            'tujuan_surat'   => 'required|string|max:255',
            'perihal'        => 'required|string|max:255',
            'keterangan'     => 'nullable',
            'file_surat'     => 'nullable|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $file = null;

        if ($request->hasFile('file_surat')) {
            $file = $request->file('file_surat')
                ->store('surat-keluar', 'public');
        }

        SuratKeluar::create([
            'nomor_agenda'  => $request->nomor_agenda,
            'nomor_surat'   => $request->nomor_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'tujuan_surat'  => $request->tujuan_surat,
            'perihal'       => $request->perihal,
            'keterangan'    => $request->keterangan,
            'file_surat'    => $file,
            'user_id'       => Auth::id(),
        ]);

        return redirect()
            ->route('surat-keluar.index')
            ->with('success', 'Data surat keluar berhasil ditambahkan.');
    }

    public function show(SuratKeluar $suratKeluar)
    {
        return view('surat-keluar.show', compact('suratKeluar'));
    }

    public function edit(SuratKeluar $suratKeluar)
    {
        return view('surat-keluar.edit', compact('suratKeluar'));
    }

    public function update(Request $request, SuratKeluar $suratKeluar)
    {
        $request->validate([
            'nomor_agenda'   => 'nullable|string|max:255',
            'nomor_surat'    => 'required|string|max:255',
            'tanggal_surat'  => 'required|date',
            'tujuan_surat'   => 'required|string|max:255',
            'perihal'        => 'required|string|max:255',
            'keterangan'     => 'nullable',
            'file_surat'     => 'nullable|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $file = $suratKeluar->file_surat;

        if ($request->hasFile('file_surat')) {

            if (
                $suratKeluar->file_surat &&
                Storage::disk('public')->exists($suratKeluar->file_surat)
            ) {
                Storage::disk('public')->delete($suratKeluar->file_surat);
            }

            $file = $request->file('file_surat')
                ->store('surat-keluar', 'public');
        }

        $suratKeluar->update([
            'nomor_agenda'  => $request->nomor_agenda,
            'nomor_surat'   => $request->nomor_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'tujuan_surat'  => $request->tujuan_surat,
            'perihal'       => $request->perihal,
            'keterangan'    => $request->keterangan,
            'file_surat'    => $file,
        ]);

        return redirect()
            ->route('surat-keluar.index')
            ->with('success', 'Data surat keluar berhasil diperbarui.');
    }

    public function destroy(SuratKeluar $suratKeluar)
    {
        if (
            $suratKeluar->file_surat &&
            Storage::disk('public')->exists($suratKeluar->file_surat)
        ) {
            Storage::disk('public')->delete($suratKeluar->file_surat);
        }

        $suratKeluar->delete();

        return redirect()
            ->route('surat-keluar.index')
            ->with('success', 'Data surat keluar berhasil dihapus.');
    }
}
