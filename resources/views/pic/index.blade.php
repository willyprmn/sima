@extends('layouts.main')

@section('container')
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">PIC List</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
            <a href="/pic/create" class="btn btn-primary">Tambah</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>PIC</th>
                            <th>Akronim</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pics as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->picName }}</td>
                            <td>{{ $p->akronim }}</td>
                            <td>
                                <!-- <a href="/pic/{{ $p->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a> -->
                                <form action="/pic/{{ $p->id }}/edit" method="GET" class="d-inline">
                                    <button class="btn btn-outline"><span><i class="fas fa-edit" style="color: #0969e7;" title="Ubah"></i></span></button>
                                </form>

                                <form action="/pic/{{ $p->id }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-outline" onclick="return confirm('Apakah yakin akan dihapus ?')"><span><i class="fas fa-trash" style="color: #ef5350;" title="Hapus"></i></span></button>
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
@endsection