@extends('dashboard.main')
@section('container')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Data Pegawai</h1>
            <div class="row justify-content-between">
                <div class="">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Form Edit Data Pegawai
                        </div>
                        <div class="card-body ">
                            <form action="/simpan-pegawai" method="POST" enctype="multipart/form-data">
                                @csrf <!-- Token CSRF Laravel -->
                                <div class="mb-2">
                                    {{-- <label for="nama" class="form-label">Nama Lengkap</label> --}}
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            placeholder="Masukkan Nama Lengkap">
                                        <label for="nama">Nama Lengkap</label>
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
                                            <select class="form-select" id="jabatan" name="jabatan">
                                                <option selected disabled>Pilih Jabatan</option>
                                                <option value="1">Manager</option>
                                                <option value="2">Supervisor</option>
                                                <option value="3">Staff</option>
                                            </select>
                                            <label for="jabatan">Jabatan</label>
                                        </div>
                                    </div>
                                    <div class="mb-2 col">
                                        {{-- <label for="honor" class="form-label">Honor</label> --}}
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="honor" name="honor"
                                                placeholder="Masukkan Honor">
                                            <label for="honor">Honor</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="mb-2 col">
                                        {{-- <label for="tempatLahir" class="form-label">Tempat Lahir</label> --}}
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="tempatLahir" name="tempat_lahir"
                                                placeholder="Masukkan Tempat Lahir">
                                            <label for="tempatLahir">Tempat Lahir</label>
                                        </div>
                                    </div>
                                    <div class="mb-2 col">
                                        {{-- <label for="tanggalLahir" class="form-label">Tanggal Lahir</label> --}}
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="tanggalLahir"
                                                name="tanggal_lahir">
                                            <label for="tanggalLahir">Tanggal Lahir</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    {{-- <label for="alamat" class="form-label">Alamat</label> --}}
                                    <div class="form-floating">
                                        <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat"></textarea>
                                        <label for="alamat">Alamat</label>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="mb-2 col">
                                        {{-- <label for="nomorTelepon" class="form-label">Nomor Telepon</label> --}}
                                        <div class="form-floating">
                                            <input type="tel" class="form-control" id="nomorTelepon"
                                                name="nomor_telepon" placeholder="Masukkan Nomor Telepon">
                                            <label for="nomorTelepon">Nomor Telepon</label>
                                        </div>
                                    </div>
                                    <div class="mb-2 col">
                                        {{-- <label for="pendidikan" class="form-label">Pendidikan Terakhir</label> --}}
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="pendidikan" name="pendidikan"
                                                placeholder="Masukkan Pendidikan Terakhir">
                                            <label for="pendidikan">Pendidikan Terakhir</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="mb-2 col">
                                        {{-- <label for="tanggalMasuk" class="form-label">Tanggal Masuk</label> --}}
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="tanggalMasuk"
                                                name="tanggal_masuk">
                                            <label for="tanggalMasuk">Tanggal Masuk</label>
                                        </div>
                                    </div>
                                    <div class="mb-2 col">
                                        {{-- <label for="foto" class="form-label">Foto</label> --}}
                                        <div class="form-floating">
                                            <input type="file" class="form-control" id="foto" name="foto">
                                            <label for="foto">Foto</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-secondary">Kosongkan</button>
                                <a href="/pegawai" class="btn btn-success">Batal</a>
                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
