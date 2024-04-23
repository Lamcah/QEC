<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instruktur;

class InstrukturController extends Controller
{
    // Method untuk menampilkan semua data 
    public function index()
    {
        $instruktur = Instruktur::all();
        return view('data.instruktur.datainstruktur', compact('instruktur'));
        
    }

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
        'foto' => 'required|image|max:2048', // Menyimpan foto instruktur dengan maksimal ukuran 2MB
    ]);

    // Gabungkan kode wilayah dengan nomor telepon
    $nomor_telepon = '+62' . $request->input('nomor_telepon');

    // Generate kode instruktur otomatis
    $latestPegawai = Instruktur::latest()->first();
    if ($latestPegawai) {
        $kodePegawai = 'IN' . str_pad((int) substr($latestPegawai->kode_instruktur, 2) + 1, 4, '0', STR_PAD_LEFT);
    } else {
        $kodePegawai = 'IN0001';
    }

    // Simpan data instruktur ke dalam database
    $fotoPath = $request->file('foto')->store('foto_instruktur', 'public');

    // Simpan data instruktur menggunakan metode create
    $instruktur = Instruktur::create([
        'kode_instruktur' => $kodePegawai,
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

    // Mengecek apakah data instruktur berhasil disimpan
    if ($instruktur) {
        return redirect()->route('instruktur.index')->with('success', 'Instruktur berhasil ditambahkan.');
    } else {
        return back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data instruktur.');
    }
}

    // Method untuk menyimpan data instruktur yang telah diedit
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

    // Cari data instruktur berdasarkan ID
    $instruktur = Instruktur::findOrFail($id);

    // Perbarui data instruktur
    $instruktur->nama = $validatedData['nama'];
    $instruktur->email = $validatedData['email'];
    $instruktur->jenis_kelamin = $validatedData['jenis_kelamin'];
    $instruktur->jabatan = $validatedData['jabatan'];
    $instruktur->honor = $validatedData['honor'];
    $instruktur->tempat_lahir = $validatedData['tempat_lahir'];
    $instruktur->tanggal_lahir = $validatedData['tanggal_lahir'];
    $instruktur->alamat = $validatedData['alamat'];
    $instruktur->nomor_telepon = $nomor_telepon;
    $instruktur->pendidikan_terakhir = $validatedData['pendidikan_terakhir'];
    $instruktur->tanggal_masuk = $validatedData['tanggal_masuk'];

    // Perbarui foto jika diunggah
    if ($request->hasFile('foto')) {
        $fotoPath = $request->file('foto')->store('foto_instruktur', 'public');
        $instruktur->foto = $fotoPath;
    }

    // Simpan perubahan
    $instruktur->save();

    // Redirect dengan pesan berhasil
    return redirect()->route('instruktur.index')->with('success', 'Data instruktur berhasil diperbarui.');
}

    // Method untuk menghapus data instruktur berdasarkan ID
    
    public function destroy($id)
{
    $instruktur = Instruktur::findOrFail($id);
    $instruktur->delete();

    return redirect()->route('instruktur.index')->with('success', 'Data instruktur berhasil dihapus.');
}

}
