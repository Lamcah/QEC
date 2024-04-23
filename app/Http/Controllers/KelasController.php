<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Instruktur;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('kelas.index', compact('kelas'));
    }

    public function create()
    {
        $instruktur = Instruktur::all();
        return view('kelas.create', compact('instruktur'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_kelas' => 'required|unique:kelas',
            'nama_kelas' => 'required',
            'instruktur_id' => 'required',
            'biaya_private' => 'required',
            'biaya_reguler' => 'required',
        ]);

        Kelas::create($validatedData);

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil ditambahkan.');
    }

    public function edit(Kelas $kelas)
    {
        $instruktur = Instruktur::all();
        return view('kelas.edit', compact('kelas', 'instruktur'));
    }

    public function update(Request $request, Kelas $kelas)
    {
        $validatedData = $request->validate([
            'kode_kelas' => 'required|unique:kelas,kode_kelas,' . $kelas->id,
            'nama_kelas' => 'required',
            'instruktur_id' => 'required',
            'biaya_private' => 'required',
            'biaya_reguler' => 'required',
        ]);

        $kelas->update($validatedData);

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil diperbarui.');
    }

    public function destroy(Kelas $kelas)
    {
        $kelas->delete();

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil dihapus.');
    }
}
