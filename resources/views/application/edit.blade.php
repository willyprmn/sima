@extends('layouts.main')

@section('container')
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Edit Data PIC</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form PIC</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="/app/{{ $apps[0]->id }}" class="mb-5">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="appName" class="form-label">Aplikasi</label>
                    <input type="text" class="form-control @error('appName') is-invalid @enderror" id="appName" name="appName" value="{{ old('appName', $apps[0]->appName) }}" autofocus required>
                    @error('appName')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="framework" class="form-label">Alamat URL</label>
                    <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url" value="{{ old('url', $apps[0]->url) }}" required>
                    @error('url')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="framework" class="form-label">Framework</label>
                    <input type="text" class="form-control @error('framework') is-invalid @enderror" id="framework" name="framework" value="{{ old('framework', $apps[0]->framework) }}" required>
                    @error('framework')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tahunPengadaan" class="form-label">Tahun Pengadaan</label>
                    <input type="text" class="form-control @error('tahunPengadaan') is-invalid @enderror" id="tahunPengadaan" name="tahunPengadaan" value="{{ old('tahunPengadaan', $apps[0]->tahunPengadaan) }}" required>
                    @error('tahunPengadaan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" name="status">
                        @if ($apps[0]->status == 'High Priority')
                        <option value="High Priority" selected>High Priority</option>
                        <option value="Standard">Standard</option>
                        @else
                        <option value="High Priority">High Priority</option>
                        <option value="Standard" selected>Standard</option>
                        @endif
                    </select>
                </div>
                <div class="mb-3">
                    <label for="class" class="form-label">Class</label>
                    <select class="form-control" name="class">
                        @if ($apps[0]->class == 'Tools Manajemen')
                        <option value="Tools Manajemen" selected>Tools Manajemen</option>
                        <option value="Aplikasi Program">Aplikasi Program</option>
                        @else
                        <option value="Tools Manajemen">Tools Manajemen</option>
                        <option value="Aplikasi Program" selected>Aplikasi Program</option>
                        @endif
                    </select>
                </div>
                <div class="mb-3">
                    <label for="grade" class="form-label">Grade</label>
                    <select class="form-control" name="grade">
                        @if ($apps[0]->grade == 'A')
                        <option value="A" selected>A</option>
                        <option value="B">B</option>
                        @else
                        <option value="A">A</option>
                        <option value="B" selected>B</option>
                        @endif
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pic" class="form-label">PIC</label>
                    <select class="form-control" name="pic_id">
                        @foreach ($pics as $p)
                        @if (old('pic_id', $apps[0]->pic_id) == $p->id)
                        <option value="{{ $p->id }}" selected>{{ $p->picName }}</option>
                        @else
                        <option value="{{ $p->id }}">{{ $p->picName }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div>
                    <a href="/app" class="btn btn-warning">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection