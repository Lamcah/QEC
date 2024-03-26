@extends('dashboard.main')
@section('container')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Pegawai</h1>
            <a href="/tambahdatapegawai" class="btn btn-success">Tambah Data</a>
            {{-- <button type="button" class="btn btn-success">Tambah Data</button> --}}
            <p></p>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Tabel Pegawai

                    <div class="card-body">
                        <table id="datatablesSimple" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode Inds</th>
                                    <th>Nama Lengkap</th>
                                    <th>Kelas</th>
                                    <th>No Telepon</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>Ins001</td>
                                    <td>Alam Syah</td>
                                    <td>Aplikasi Perkantoran</td>
                                    <td>082909876546</td>
                                    <td> 
                                        <a href="/editdatapegawai"  class="btn btn-warning">Edit</a> 
                                        <button type="button"
                                            class="btn btn-danger">Hapus</button></td>
                                </tr>
                                <tr>
                                    <td>Ins001</td>
                                    <td>Alam Syah</td>
                                    <td>Aplikasi Perkantoran</td>
                                    <td>082909876546</td>
                                    <td> <button type="button" class="btn btn-warning">Edit</button> <button type="button"
                                            class="btn btn-danger">Hapus</button></td>
                                </tr>
                                <tr>
                                    <td>Ins001</td>
                                    <td>Alam Syah</td>
                                    <td>Aplikasi Perkantoran</td>
                                    <td>082909876546</td>
                                    <td> <button type="button" class="btn btn-warning">Edit</button> <button type="button"
                                            class="btn btn-danger">Hapus</button></td>
                                </tr>
                                <tr>
                                    <td>Ins001</td>
                                    <td>Alam Syah</td>
                                    <td>Aplikasi Perkantoran</td>
                                    <td>082909876546</td>
                                    <td> <button type="button" class="btn btn-warning">Edit</button> <button type="button"
                                            class="btn btn-danger">Hapus</button></td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </main>
@endsection
