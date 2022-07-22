@extends('layouts.main')

@section('container')
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Application List</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
            <a href="/app/create" class="btn btn-primary"><i class="fas fa-plus me-1"></i> Tambah</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Sukses - </strong> {{ session('success') }}
                </div>
                @endif
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Aplikasi</th>
                            <th>Alamat URL</th>
                            <th>PIC</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($apps as $a)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $a->appName }}</td>
                            <td>{{ $a->url }}</td>
                            <td>{{ $a->pics->akronim }}</td>
                            <td>
                                <!-- <a href="/app/{{ $a->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a> -->
                                <form action="/app/{{ $a->id }}/edit" method="GET" class="d-inline">
                                    <button class="btn btn-outline"><span><i class="fas fa-edit" style="color: #0969e7;" title="Ubah"></i></span></button>
                                </form>

                                <form action="/app/{{ $a->id }}" method="POST" class="d-inline">
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