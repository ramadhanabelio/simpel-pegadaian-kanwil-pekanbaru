<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{
    public function index()
    {
        $suratMasuk = SuratMasuk::latest()->get();

        return view('surat-masuk.index', compact('suratMasuk'));
    }

    public function create()
    {
        return view('surat-masuk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_agenda' => 'nullable|string|max:255',
            'nomor_surat' => 'required|string|max:255',
            'tanggal_surat' => 'required|date',
            'tanggal_terima' => 'required|date',
            'asal_surat' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'keterangan' => 'nullable',
            'file_surat' => 'nullable|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $file = null;

        if ($request->hasFile('file_surat')) {
            $file = $request->file('file_surat')
                ->store('surat-masuk', 'public');
        }

        SuratMasuk::create([
            'nomor_agenda' => $request->nomor_agenda,
            'nomor_surat' => $request->nomor_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'tanggal_terima' => $request->tanggal_terima,
            'asal_surat' => $request->asal_surat,
            'perihal' => $request->perihal,
            'keterangan' => $request->keterangan,
            'file_surat' => $file,
            'user_id' => Auth::id(),
        ]);

        return redirect()
            ->route('surat-masuk.index')
            ->with('success', 'Data surat masuk berhasil ditambahkan.');
    }

    public function show(SuratMasuk $suratMasuk)
    {
        return view('surat-masuk.show', compact('suratMasuk'));
    }

    public function edit(SuratMasuk $suratMasuk)
    {
        return view('surat-masuk.edit', compact('suratMasuk'));
    }

    public function update(Request $request, SuratMasuk $suratMasuk)
    {
        $request->validate([
            'nomor_agenda' => 'nullable|string|max:255',
            'nomor_surat' => 'required|string|max:255',
            'tanggal_surat' => 'required|date',
            'tanggal_terima' => 'required|date',
            'asal_surat' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'keterangan' => 'nullable',
            'file_surat' => 'nullable|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $file = $suratMasuk->file_surat;

        if ($request->hasFile('file_surat')) {

            if (
                $suratMasuk->file_surat &&
                Storage::disk('public')->exists($suratMasuk->file_surat)
            ) {

                Storage::disk('public')->delete($suratMasuk->file_surat);
            }

            $file = $request->file('file_surat')
                ->store('surat-masuk', 'public');
        }

        $suratMasuk->update([
            'nomor_agenda' => $request->nomor_agenda,
            'nomor_surat' => $request->nomor_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'tanggal_terima' => $request->tanggal_terima,
            'asal_surat' => $request->asal_surat,
            'perihal' => $request->perihal,
            'keterangan' => $request->keterangan,
            'file_surat' => $file,
        ]);

        return redirect()
            ->route('surat-masuk.index')
            ->with('success', 'Data surat masuk berhasil diperbarui.');
    }

    public function destroy(SuratMasuk $suratMasuk)
    {
        if (
            $suratMasuk->file_surat &&
            Storage::disk('public')->exists($suratMasuk->file_surat)
        ) {
            Storage::disk('public')->delete($suratMasuk->file_surat);
        }

        $suratMasuk->delete();

        return redirect()
            ->route('surat-masuk.index')
            ->with('success', 'Data surat masuk berhasil dihapus.');
    }
}
