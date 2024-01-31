@extends('dashboard.main')
@section('container')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Master Siswa</h1>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Tabel Master Siswa
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Kode Siswa</th>
                            <th>Nama Lengkap</th>
                            <th>Nama Kelas</th>
                            <th>Jenis Kelas</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Telp</th>
                            <th>Pendidikan Terakhir</th>
                            <th>Tanggal Masuk</th>
                            <th>Foto</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <th>001</th>
                            <th>Alam Syah</th>
                            <th>Aplikasi Perkantoran</th>
                            <th>Reguler</th>
                            <th>Laki-Laki</th>
                            <th>Palopo</th>
                            <th>082987876543</th>
                            <th>SMA</th>
                            <th>13 April 2021</th>
                            <th></th>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>


    </div>
</main>
@endsection