@extends('dashboard.main')
@section('container')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Siswa</h1>
        <button type="button" class="btn btn-success">Tambah Data</button>
        <p></p>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Tabel Siswa
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Kode Siswa</th>
                            <th>Nama Lengkap</th>
                            <th>Nama Kelas</th>
                            <th>Jenis Kelas</th>
                            <th>Bulan Masuk</th>
                            <th>Tahun Masuk</th>
                            <th>Status</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1904</td>
                            <td>Alam Syah</td>
                            <td>Aplikasi Perkantoran</td>
                            <td>Reguler</td>
                            <td>Maret</td>
                            <td>2019</td>
                            <td>Berjalan</td>
                            <td> <button type="button" class="btn btn-warning">Edit</button> <button type="button" class="btn btn-danger">Hapus</button></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>


    </div>
</main>
@endsection