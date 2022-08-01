@extends('layouts.main')

@section('container')
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800 text-center">Tambah Data PIC</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form PIC</h6>
        </div>
        <div class="card-body">
            <h6 class="required">* ) required</h6>
            <br>
            <form method="POST" action="/pic" class="mb-5">
                @csrf
                <div class="mb-3">
                    <label for="picName" class="form-label">Nama PIC <b class="required">*</b></label>
                    <input type="text" class="form-control @error('picName') is-invalid @enderror" id="picName" name="picName" value="{{ old('picName') }}" autofocus required>
                    @error('picName')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="akronim" class="form-label">Akronim <b class="required">*</b></label>
                    <input type="text" class="form-control @error('akronim') is-invalid @enderror" id="akronim" name="akronim" value="{{ old('akronim') }}" required>
                    @error('akronim')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div>
                    <a href="/pic" class="btn btn-outline-warning"><i class="fa fa-undo"></i> Kembali</a>
                    <button type="submit" class="btn btn-outline-success"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection