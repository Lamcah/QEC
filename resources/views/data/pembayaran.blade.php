@extends('dashboard.main')
@section('container')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Pembayaran Siswa</h1>
        <button type="button" class="btn btn-success">Tambah Data</button>
        <p></p>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Tabel Pembayaran Siswa
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Kode Siswa</th>
                            <th>Nama Siswa</th>
                            <th>Nama Kelas</th>
                            <th>Jenis Kelas</th>
                            <th>Biaya</th>
                            <th>Angsuran 1</th>
                            <th>Angsuran 2</th>
                            <th>Sisa Bayar</th>
                            <th>Status</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <th>001</th>
                            <th>Alam Syah</th>
                            <th>Aplikasi Perkantoran</th>
                            <th>Reguler</th>
                            <th>Rp. 1.500.000</th>
                            <th>Rp. 1.000.000</th>
                            <th>Rp. 500.000</th>
                            <th>Tidak Ada</th>
                            <th>Lunas</th>
                            <td> <button type="button" class="btn btn-warning">Edit</button> <button type="button" class="btn btn-danger">Hapus</button></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>


    </div>
</main>
@endsection