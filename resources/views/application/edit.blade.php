@extends('layouts.main')

@section('container')
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Edit Data Aplikasi</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Aplikasi</h6>
        </div>
        <div class="card-body">
            <h6 class="required">* ) required</h6>
            <br>
            <form method="POST" action="/app/{{ $apps[0]->id }}" class="mb-5">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="appName" class="form-label">Aplikasi <b class="required">*</b></label>
                    <input type="text" class="form-control @error('appName') is-invalid @enderror" id="appName" name="appName" value="{{ old('appName', $apps[0]->appName) }}" autofocus required>
                    @error('appName')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="framework" class="form-label">Alamat URL <b class="required">*</b></label>
                    <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url" value="{{ old('url', $apps[0]->url) }}" required>
                    @error('url')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="framework" class="form-label">Framework</label>
                    <input type="text" class="form-control" id="framework" name="framework" value="{{ old('framework', $apps[0]->framework) }}">
                </div>
                <div class="mb-3">
                    <label for="tahunPengadaan" class="form-label">Tahun Pengadaan <b class="required">*</b></label>
                    <select class="form-control @error('tahunPengadaan') is-invalid @enderror" id="tahunPengadaan" name="tahunPengadaan" required>
                        <option selected disabled></option>
                        @for ($i=date('Y'); $i>=date('Y')-22; $i-=1)
                        <option value="{{ $i }}" @if (old('tahunPengadaan', $apps[0]->tahunPengadaan)==$i ) selected="selected" @endif>{{ $i }}</option>
                        @endfor
                    </select>
                    @error('tahunPengadaan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option selected></option>
                        <option value="High Priority" @if (old('status', $apps[0]->status)=='High Priority' ) selected="selected" @endif>High Priority</option>
                        <option value="Standard" @if (old('status', $apps[0]->status)=='Standard' ) selected="selected" @endif>Standard</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="class" class="form-label">Class</label>
                    <select class="form-control" id="class" name="class">
                        <option selected></option>
                        <option value="Tools Manajemen" @if (old('class', $apps[0]->class)=='Tools Manajemen' ) selected="selected" @endif>Tools Manajemen</option>
                        <option value="Aplikasi Program" @if (old('class', $apps[0]->class)=='Aplikasi Program' ) selected="selected" @endif>Aplikasi Program</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="grade" class="form-label">Grade</label>
                    <select class="form-control" id="grade" name="grade">
                        <option selected></option>
                        <option value="A" @if (old('grade', $apps[0]->grade)=='A' ) selected="selected" @endif>A</option>
                        <option value="B" @if (old('grade', $apps[0]->grade)=='B' ) selected="selected" @endif>B</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pic" class="form-label">PIC <b class="required">*</b></label>
                    <select class="form-control @error('pic_id') is-invalid @enderror" id="pic_id" name="pic_id" required>
                        @foreach ($pics as $p)
                        @if (old('pic_id', $apps[0]->pic_id) == $p->id)
                        <option value="{{ $p->id }}" selected>{{ $p->picName }}</option>
                        @else
                        <option value="{{ $p->id }}">{{ $p->picName }}</option>
                        @endif
                        @endforeach
                    </select>
                    @error('pic_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ old('keterangan', $apps[0]->keterangan) }}">
                </div>
                <div>
                    <a href="/app" class="btn btn-warning"><i class="fa fa-undo"></i> Kembali</a>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection