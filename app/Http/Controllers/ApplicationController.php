<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\AppModel;
use App\Models\PicModel;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('application/index', [
            'title' => 'Aplikasi',
            'apps' => AppModel::with('pics')->orderBy('id', 'asc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('application/create', [
            'title' => 'Tambah Aplikasi',
            'pics' => PicModel::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'appName' => 'required|unique:apps|max:255',
            'url' => 'required|unique:apps|max:255',
            'tahunPengadaan' => 'required|numeric',
            'pic_id' => 'required',
            'keterangan' => 'required'
        ], [
            'appName.required' => 'Nama aplikasi wajib di isi',
            'appName.unique' => 'Nama aplikasi sudah tersedia',
            'appName.max' => 'Nama aplikasi terlalu panjang',
            'url.required' => 'Url aplikasi wajib di isi',
            'url.unique' => 'Url aplikasi sudah tersedia',
            'url.max' => 'Url aplikasi terlalu panjang',
            'tahunPengadaan.required' => 'Tahun pengadaan wajib di isi',
            'tahunPengadaan.numeric' => 'Tahun pengadaan wajib dalam bentuk angka',
            'pic_id.required' => 'PIC wajib di pilih',
            'keterangan.required' => 'Keterangan wajib di isi'
        ]);

        $data = [
            'appName' => $validatedData['appName'],
            'url' => $validatedData['url'],
            'pic_id' => $validatedData['pic_id'],
            'framework' => $request['framework'],
            'tahunPengadaan' => $validatedData['tahunPengadaan'],
            'status' => $request['status'],
            'class' => $request['class'],
            'grade' => $request['grade'],
            'keterangan' => $validatedData['keterangan']
        ];

        AppModel::create($data);

        return redirect('/app')->with('success', 'Data aplikasi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('application/edit', [
            'title' => 'Ubah Aplikasi',
            'apps' => AppModel::where('id', $id)->get(),
            'pics' => PicModel::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'appName' => ['required', Rule::unique('apps')->ignore($id), 'max:255'],
            'url' => ['required', Rule::unique('apps')->ignore($id), 'max:255'],
            'tahunPengadaan' => 'required|numeric',
            'pic_id' => 'required',
            'keterangan' => 'required'
        ], [
            'appName.required' => 'Nama aplikasi wajib di isi',
            'appName.unique' => 'Nama aplikasi sudah tersedia',
            'appName.max' => 'Nama aplikasi terlalu panjang',
            'url.required' => 'Url aplikasi wajib di isi',
            'url.unique' => 'Url aplikasi sudah tersedia',
            'url.max' => 'Url aplikasi terlalu panjang',
            'tahunPengadaan.required' => 'Tahun pengadaan wajib di isi',
            'tahunPengadaan.numeric' => 'Tahun pengadaan wajib dalam bentuk angka',
            'pic_id.required' => 'PIC wajib di pilih',
            'keterangan.required' => 'Keterangan wajib di isi'
        ]);

        $data = [
            'appName' => $validatedData['appName'],
            'url' => $validatedData['url'],
            'pic_id' => $validatedData['pic_id'],
            'framework' => $request['framework'],
            'tahunPengadaan' => $validatedData['tahunPengadaan'],
            'status' => $request['status'],
            'class' => $request['class'],
            'grade' => $request['grade'],
            'keterangan' => $validatedData['keterangan']
        ];

        AppModel::where('id', $id)->update($data);

        return redirect('/app')->with('success', 'Data aplikasi berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AppModel::destroy($id);

        return redirect('/app')->with('success', 'Data aplikasi berhasil dihapus!');
    }
}
