<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    // Method untuk menampilkan semua data pegawai
    public function index()
    {
        // $pegawai = Pegawai::all();
        // return view('pegawai.index', compact('pegawai'));
        return view('data.pegawai.datapegawai');

    }

    // Method untuk menampilkan form tambah data pegawai
    public function create()
    {
        return view('data.pegawai.tambahdatapegawai');
    }

    // Method untuk menyimpan data pegawai yang baru ditambahkan
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            // tambahkan validasi untuk input lainnya
        ]);

        // Simpan data pegawai yang baru
        Pegawai::create($request->all());

        // return redirect()->route('pegawai.index')
            // ->with('success', 'Pegawai berhasil ditambahkan.');
        return redirect()->route('/pegawai')
            ->with('success', 'Pegawai berhasil ditambahkan.');
    }

    

    // Method untuk menampilkan form edit data pegawai berdasarkan ID
    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.edit', compact('pegawai'));
    }

    // Method untuk menyimpan data pegawai yang telah diedit
    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            // tambahkan validasi untuk input lainnya
        ]);

        // Update data pegawai yang telah diedit
        Pegawai::findOrFail($id)->update($request->all());

        return redirect()->route('pegawai.index')
            ->with('success', 'Data pegawai berhasil diperbarui.');
    }

    // Method untuk menghapus data pegawai berdasarkan ID
    public function destroy($id)
    {
        Pegawai::findOrFail($id)->delete();
        return redirect()->route('pegawai.index')
            ->with('success', 'Pegawai berhasil dihapus.');
    }
}
