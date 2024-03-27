@extends('dashboard.main')
@section('container')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Data Pegawai</h1>
            <div class="row justify-content-between">
                <div class="">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Form Data Pegawai
                        </div>
                        <div class="card-body ">
                            {{-- <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data"> --}}
                            <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">

                                @csrf <!-- Token CSRF Laravel -->
                                <div class="row g-3">
                                    <div class="mb-2 col">
                                        {{-- <label for="nama" class="form-label">Nama Lengkap</label> --}}
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="nama" name="nama"
                                                placeholder="Masukkan Nama Lengkap" required>
                                            <label for="nama">Nama Lengkap</label>
                                        </div>
                                    </div>
                                    <div class="mb-2 col">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" name="email"
                                                required>
                                            <label for="email">Email</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-2 form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="jenisKelamin" name="jenis_kelamin"
                                        value="Laki-laki">
                                    <label class="form-check-label" for="jenisKelamin">Laki-laki</label>
                                </div>
                                <div class="mb-2 form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="jenisKelamin2" name="jenis_kelamin"
                                        value="Perempuan">
                                    <label class="form-check-label" for="jenisKelamin2">Perempuan</label>
                                </div>
                                <div class="row g-3">
                                    <div class="mb-2 col">
                                        {{-- <label for="jabatan" class="form-label">Jabatan</label> --}}
                                        <div class="form-floating">
                                            <select class="form-select" id="jabatan" name="jabatan" required>
                                                <option selected disabled>Pilih Jabatan</option>
                                                <option value="Manager">Manager</option>
                                                <option value="Supervisor">Supervisor</option>
                                                <option value="Staff">Staff</option>
                                            </select>
                                            <label for="jabatan">Jabatan</label>
                                        </div>
                                    </div>
                                    <div class="mb-2 col">
                                        {{-- <label for="honor" class="form-label">Honor</label> --}}
                                        <div class="form-floating">
                                            <input type="number" class="form-control" id="honor" name="honor"
                                                placeholder="Masukkan Honor" required>
                                            <label for="honor">Honor</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="mb-2 col">
                                        {{-- <label for="tempatLahir" class="form-label">Tempat Lahir</label> --}}
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="tempatLahir" name="tempat_lahir"
                                                placeholder="Masukkan Tempat Lahir" required>
                                            <label for="tempatLahir">Tempat Lahir</label>
                                        </div>
                                    </div>
                                    <div class="mb-2 col">
                                        {{-- <label for="tanggalLahir" class="form-label">Tanggal Lahir</label> --}}
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="tanggalLahir"
                                                name="tanggal_lahir" required>
                                            <label for="tanggalLahir">Tanggal Lahir</label>
                                        </div>
                                    </div>
                                    <div class="mb-2 col">
                                        {{-- <label for="tanggalMasuk" class="form-label">Tanggal Masuk</label> --}}
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="tanggalMasuk"
                                                name="tanggal_masuk">
                                            <label for="tanggalMasuk">Tanggal Masuk</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-2">
                                    {{-- <label for="alamat" class="form-label">Alamat</label> --}}
                                    <div class="form-floating">
                                        <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat" required></textarea>
                                        <label for="alamat">Alamat</label>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col mb-2">
                                        <div class="input-group ">
                                            <span class="input-group-text">+62</span>
                                            <div class="form-floating">
                                                <input type="tel" class="form-control" id="nomor_telepon"
                                                    name="nomor_telepon" required>
                                                <label for="nomor_telepon">Nomor Telepon</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-2 col">
                                        {{-- <label for="pendidikan" class="form-label">Pendidikan Terakhir</label> --}}
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="pendidikan_terakhir	"
                                                name="pendidikan_terakhir" placeholder="Masukkan Pendidikan Terakhir">
                                            <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-2 ">
                                    {{-- <label for="foto" class="form-label">Foto</label> --}}
                                    <div class="input-group mb-3">
                                        <label class="input-group-text " for="foto">Foto</label>
                                        <input type="file" class="form-control " id="foto" name="foto">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-secondary">Kosongkan</button>
                                <a href="/datapegawai" class="btn btn-success">Batal</a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
