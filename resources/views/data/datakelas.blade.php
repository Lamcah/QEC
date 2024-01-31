@extends('dashboard.main')
@section('container')
<link href="https:////cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet" />
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Kelas</h1>
        <button type="button" class="btn btn-success">Tambah Data</button>
        <p></p>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Tabel Kelas
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Kode Kelas</th>
                            <th>Nama Kelas</th>
                            <th>Instruktur</th>
                            <th>Biaya Reguler</th>
                            <th>Biaya Privat</th>
                            <th>Aksi</th>


                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>EFC01</td>
                            <td>English For Communication</td>
                            <td>Alam Syah</td>
                            <td>Rp. 1.250.000</td>
                            <td>Rp. 2.000.000</td>
                            <td> <button type="button" class="btn btn-warning">Edit</button> <button type="button" class="btn btn-danger">Hapus</button></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>


    </div>
</main>
<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    let table = new DataTable('#myTable');
</script>
@endsection