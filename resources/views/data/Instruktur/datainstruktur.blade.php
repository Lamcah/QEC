@extends('dashboard.main')
@section('container')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Instruktur</h1>
            {{-- <a href="{{ route('instruktur.create') }}" class="btn btn-success">Tambah Data</a> --}}
            {{-- <button type="button" class="btn btn-success">Tambah Data</button> --}}
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">
                Tambah Data
            </button>
            <p></p>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Tabel Instruktur

                    <div class="card-body">
                        <table id="datatablesSimple" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode Instruktur</th>
                                    <th>Nama Lengkap</th>
                                    <th>Kelas</th>
                                    <th>No Telepon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($instruktur as $data)
                                    <tr>
                                        <td>{{ $data->kode_instruktur }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->jabatan }}</td>
                                        <td>{{ $data->nomor_telepon }}</td>
                                        <td>
                                            <a href="#" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $data->id }}"
                                                data-id="{{ $data->id }}">
                                                Edit
                                            </a>
                                            <form action="{{ route('instruktur.destroy', $data->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit -->
        @foreach ($instruktur as $data)
            <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1"
                aria-labelledby="editModalLabel{{ $data->id }}" aria-hidden="true">
                <div class=" modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel{{ $data->id }}">Edit Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('instruktur.update', $data->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <!-- Isi form dengan data yang ingin diubah -->
                                <div class="row g-2">
                                    <div class="mb-3 col form-floating">
                                        <input type="text" class="form-control" id="editNama" name="nama"
                                            value="{{ $data->nama }}" required>
                                        <label for="editNama" class="form-label">Nama</label>
                                    </div>
                                    <div class="mb-3 col form-floating">
                                        <input type="email" class="form-control" id="editEmail" name="email"
                                            value="{{ $data->email }}" required>
                                        <label for="editEmail" class="form-label">Email</label>
                                    </div>
                                </div>
                                <div class="mb-2 form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="jenisKelamin" name="jenis_kelamin"
                                        value="Laki-laki" {{ $data->jenis_kelamin == 'Laki-laki' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="jenisKelamin">Laki-laki</label>
                                </div>
                                <div class="mb-2 form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="jenisKelamin2" name="jenis_kelamin"
                                        value="Perempuan" {{ $data->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="jenisKelamin2">Perempuan</label>
                                </div>

                                <div class="row g-3">
                                    <div class="form-floating">
                                        <select class="form-select" id="jabatan" name="jabatan" required>
                                            <option selected disabled>Pilih Jabatan</option>
                                            <option value="Manager" {{ $data->jabatan == 'Manager' ? 'selected' : '' }}>
                                                Manager</option>
                                            <option value="Supervisor"
                                                {{ $data->jabatan == 'Supervisor' ? 'selected' : '' }}>Supervisor</option>
                                            <option value="Staff" {{ $data->jabatan == 'Staff' ? 'selected' : '' }}>Staff
                                            </option>
                                        </select>
                                        <label for="jabatan">Jabatan</label>
                                    </div>
                                    <div class="mb-2 col">
                                        {{-- <label for="honor" class="form-label">Honor</label> --}}
                                        <div class="form-floating">
                                            <input type="number" class="form-control" id="honor" name="honor"
                                                placeholder="Masukkan Honor" value="{{ $data->honor }}" required>
                                            <label for="honor">Honor</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="mb-2 col">
                                        {{-- <label for="tempatLahir" class="form-label">Tempat Lahir</label> --}}
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="tempatLahir" name="tempat_lahir"
                                                placeholder="Masukkan Tempat Lahir" value="{{ $data->tempat_lahir }}"
                                                required>
                                            <label for="tempatLahir">Tempat Lahir</label>
                                        </div>
                                    </div>
                                    <div class="mb-2 col">
                                        {{-- <label for="tanggalLahir" class="form-label">Tanggal Lahir</label> --}}
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="tanggalLahir"
                                                name="tanggal_lahir" value="{{ $data->tanggal_lahir }}" required>
                                            <label for="tanggalLahir">Tanggal Lahir</label>
                                        </div>
                                    </div>
                                    <div class="mb-2 col">
                                        {{-- <label for="tanggalMasuk" class="form-label">Tanggal Masuk</label> --}}
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="tanggalMasuk"
                                                name="tanggal_masuk" value="{{ $data->tanggal_masuk }}">
                                            <label for="tanggalMasuk">Tanggal Masuk</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-2">
                                    {{-- <label for="alamat" class="form-label">Alamat</label> --}}
                                    <div class="form-floating">
                                        <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat"
                                            value="{{ $data->alamat }}" required></textarea>
                                        <label for="alamat">Alamat</label>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col mb-2">
                                        <div class="input-group ">
                                            <span class="input-group-text">+62</span>
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="nomor_telepon"
                                                    name="nomor_telepon" required>
                                                <label for="nomor_telepon">Nomor Telepon</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-2 col">
                                        {{-- <label for="pendidikan" class="form-label">Pendidikan Terakhir</label> --}}
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="pendidikan_terakhir	"
                                                name="pendidikan_terakhir" value="{{ $data->pendidikan_terakhir }}"
                                                placeholder="Masukkan Pendidikan Terakhir">
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
                                <!-- Tambahkan input lainnya sesuai kebutuhan -->
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Modal tambah -->
        <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('instruktur.store') }}" method="POST" enctype="multipart/form-data">
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
                                            <input type="text" class="form-control" id="nomor_telepon"
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

                        </form>
                    </div>
                </div>
            </div>
        </div>


    </main>
@endsection
