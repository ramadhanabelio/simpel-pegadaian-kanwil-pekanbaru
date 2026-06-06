<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Memo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MemoController extends Controller
{
    public function index()
    {
        $memos = Memo::latest()->get();

        return view('memo.index', compact('memos'));
    }

    public function create()
    {
        return view('memo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_memo' => 'nullable|string|max:255',
            'tanggal' => 'required|date',
            'tujuan' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'isi_memo' => 'required',
            'status' => 'required|in:draft,proses,selesai',
            'lampiran' => 'nullable|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $lampiran = null;

        if ($request->hasFile('lampiran')) {
            $lampiran = $request->file('lampiran')
                ->store('memo', 'public');
        }

        Memo::create([
            'nomor_memo' => $request->nomor_memo,
            'tanggal' => $request->tanggal,
            'tujuan' => $request->tujuan,
            'perihal' => $request->perihal,
            'isi_memo' => $request->isi_memo,
            'status' => $request->status,
            'lampiran' => $lampiran,
            'user_id' => Auth::id(),
        ]);

        return redirect()
            ->route('memo.index')
            ->with('success', 'Memo berhasil ditambahkan.');
    }

    public function show(Memo $memo)
    {
        return view('memo.show', compact('memo'));
    }

    public function edit(Memo $memo)
    {
        return view('memo.edit', compact('memo'));
    }

    public function update(Request $request, Memo $memo)
    {
        $request->validate([
            'nomor_memo' => 'nullable|string|max:255',
            'tanggal' => 'required|date',
            'tujuan' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'isi_memo' => 'required',
            'status' => 'required|in:draft,proses,selesai',
            'lampiran' => 'nullable|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $lampiran = $memo->lampiran;

        if ($request->hasFile('lampiran')) {

            if (
                $memo->lampiran &&
                Storage::disk('public')->exists($memo->lampiran)
            ) {
                Storage::disk('public')->delete($memo->lampiran);
            }

            $lampiran = $request->file('lampiran')
                ->store('memo', 'public');
        }

        $memo->update([
            'nomor_memo' => $request->nomor_memo,
            'tanggal' => $request->tanggal,
            'tujuan' => $request->tujuan,
            'perihal' => $request->perihal,
            'isi_memo' => $request->isi_memo,
            'status' => $request->status,
            'lampiran' => $lampiran,
        ]);

        return redirect()
            ->route('memo.index')
            ->with('success', 'Memo berhasil diperbarui.');
    }

    public function destroy(Memo $memo)
    {
        if (
            $memo->lampiran &&
            Storage::disk('public')->exists($memo->lampiran)
        ) {
            Storage::disk('public')->delete($memo->lampiran);
        }

        $memo->delete();

        return redirect()
            ->route('memo.index')
            ->with('success', 'Memo berhasil dihapus.');
    }
}
