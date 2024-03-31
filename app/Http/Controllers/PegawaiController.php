<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    // Method untuk menampilkan semua data pegawai
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('data.pegawai.datapegawai', compact('pegawai'));
        // return view('data.pegawai.datapegawai');

    }

    // // Method untuk menampilkan form tambah data pegawai
    
    // public function create()
    // {
    //     return view('data.pegawai.tambahdatapegawai');
        
    // }

    // Method untuk menyimpan data pegawai yang baru ditambahkan
public function store(Request $request)
{
    // Validasi data input
    $validatedData = $request->validate([
        'nama' => 'required',
        'email' => 'required|email',
        'jenis_kelamin' => 'required',
        'jabatan' => 'required',
        'honor' => 'required',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required|date',
        'alamat' => 'required',
        'nomor_telepon' => 'required|numeric|digits_between:10,15',
        'pendidikan_terakhir' => 'required',
        'tanggal_masuk' => 'required|date',
        'foto' => 'required|image|max:2048', // Menyimpan foto pegawai dengan maksimal ukuran 2MB
    ]);

    // Gabungkan kode wilayah dengan nomor telepon
    $nomor_telepon = '+62' . $request->input('nomor_telepon');

    // Generate kode pegawai otomatis
    $latestPegawai = Pegawai::latest()->first();
    if ($latestPegawai) {
        $kodePegawai = 'PG' . str_pad((int) substr($latestPegawai->kode_pegawai, 2) + 1, 4, '0', STR_PAD_LEFT);
    } else {
        $kodePegawai = 'PG0001';
    }

    // Simpan data pegawai ke dalam database
    $fotoPath = $request->file('foto')->store('foto_pegawai', 'public');

    // Simpan data pegawai menggunakan metode create
    $pegawai = Pegawai::create([
        'kode_pegawai' => $kodePegawai,
        'nama' => $validatedData['nama'],
        'email' => $validatedData['email'],
        'jenis_kelamin' => $validatedData['jenis_kelamin'],
        'jabatan' => $validatedData['jabatan'],
        'honor' => $validatedData['honor'],
        'tempat_lahir' => $validatedData['tempat_lahir'],
        'tanggal_lahir' => $validatedData['tanggal_lahir'],
        'alamat' => $validatedData['alamat'],
        'nomor_telepon' => $nomor_telepon,
        'pendidikan_terakhir' => $validatedData['pendidikan_terakhir'],
        'tanggal_masuk' => $validatedData['tanggal_masuk'],
        'foto' => $fotoPath,
    ]);

    // Mengecek apakah data pegawai berhasil disimpan
    if ($pegawai) {
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil ditambahkan.');
    } else {
        return back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data pegawai.');
    }
}

    // Method untuk menyimpan data pegawai yang telah diedit
    public function update(Request $request, $id)
{
    // Validasi data input
    $validatedData = $request->validate([
        'nama' => 'required',
        'email' => 'required|email',
        'jenis_kelamin' => 'required',
        'jabatan' => 'required',
        'honor' => 'required',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required|date',
        'alamat' => 'required',
        'nomor_telepon' => 'required|numeric|digits_between:10,15',
        'pendidikan_terakhir' => 'required',
        'tanggal_masuk' => 'required|date',
        'foto' => 'image|max:2048', 
    ]);

    // Gabungkan kode wilayah dengan nomor telepon
    $nomor_telepon = '+62' . $request->input('nomor_telepon');

    // Cari data pegawai berdasarkan ID
    $pegawai = Pegawai::findOrFail($id);

    // Perbarui data pegawai
    $pegawai->nama = $validatedData['nama'];
    $pegawai->email = $validatedData['email'];
    $pegawai->jenis_kelamin = $validatedData['jenis_kelamin'];
    $pegawai->jabatan = $validatedData['jabatan'];
    $pegawai->honor = $validatedData['honor'];
    $pegawai->tempat_lahir = $validatedData['tempat_lahir'];
    $pegawai->tanggal_lahir = $validatedData['tanggal_lahir'];
    $pegawai->alamat = $validatedData['alamat'];
    $pegawai->nomor_telepon = $nomor_telepon;
    $pegawai->pendidikan_terakhir = $validatedData['pendidikan_terakhir'];
    $pegawai->tanggal_masuk = $validatedData['tanggal_masuk'];

    // Perbarui foto jika diunggah
    if ($request->hasFile('foto')) {
        $fotoPath = $request->file('foto')->store('foto_pegawai', 'public');
        $pegawai->foto = $fotoPath;
    }

    // Simpan perubahan
    $pegawai->save();

    // Redirect dengan pesan berhasil
    return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil diperbarui.');
}

    // Method untuk menghapus data pegawai berdasarkan ID
    
    public function destroy($id)
{
    $pegawai = Pegawai::findOrFail($id);
    $pegawai->delete();

    return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil dihapus.');
}

}
