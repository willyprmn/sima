<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\PicModel;

class PicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pic/index', [
            'title' => 'PIC',
            'pics' => PicModel::all()->sortBy('id')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pic/create', [
            'title' => 'Tambah PIC',
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
        // ddd($request);
        $validatedData = $request->validate([
            'picName' => 'required|unique:pics|max:255',
            'akronim' => 'required|unique:pics|max:255'
        ], [
            'picName.required' => 'Nama PIC wajib di isi',
            'picName.unique' => 'Nama PIC sudah ada',
            'picName.max' => 'Nama PIC berkarakter terlalu panjang',
            'akronim.required' => 'Akronim wajib di isi',
            'akronim.unique' => 'Akronim sudah ada',
            'akronim.max' => 'Akronim berkarakter terlalu panjang'
        ]);

        $data = [
            'picName' => ucwords($validatedData['picName']),
            'akronim' => strtoupper($validatedData['akronim'])
        ];

        PicModel::create($data);

        return redirect('/pic')->with('success', 'PIC berhasil ditambahkan!');
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
        return view('pic/edit', [
            'title' => 'Ubah PIC',
            'pics' => PicModel::where('id', $id)->get()
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
            'picName' => ['required', Rule::unique('pics')->ignore($id), 'max:255'],
            'akronim' => ['required', Rule::unique('pics')->ignore($id), 'max:255']
        ], [
            'picName.required' => 'Nama PIC wajib di isi',
            'picName.unique' => 'Nama PIC sudah ada',
            'picName.max' => 'Nama PIC berkarakter terlalu panjang',
            'akronim.required' => 'Akronim wajib di isi',
            'akronim.unique' => 'Akronim sudah ada',
            'akronim.max' => 'Akronim berkarakter terlalu panjang'
        ]);

        $data = [
            'picName' => ucwords($validatedData['picName']),
            'akronim' => strtoupper($validatedData['akronim'])
        ];

        PicModel::where('id', $id)->update($data);

        return redirect('/pic')->with('success', 'PIC berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PicModel::destroy($id);

        return redirect('/pic')->with('success', 'PIC berhasil dihapus!');
    }
}
