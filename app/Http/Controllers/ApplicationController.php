<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $pic = AppModel::with('pics')->get();
        // dd($pic);
        return view('application/index', [
            'title' => 'Application',
            'apps' => $pic
            // 'apps' = AppModel::with('pic')->get()
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
            'title' => 'Application',
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
        // ddd($request);
        $validatedData = $request->validate([
            'appName' => 'required|unique:apps|max:255',
            'url' => 'required|max:255',
            'framework' => 'required|max:255',
            'tahunPengadaan' => 'required',
            'status' => 'required',
            'class' => 'required',
            'grade' => 'required',
            'pic_id' => 'required'
        ]);

        AppModel::create($validatedData);

        return redirect('/app')->with('success', 'New Application has been added!');
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
            'title' => 'Application',
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
        $rules = [
            'appName' => 'required|unique:apps|max:255',
            'url' => 'required|max:255',
            'framework' => 'required|max:255',
            'tahunPengadaan' => 'required',
            'status' => 'required',
            'class' => 'required',
            'grade' => 'required',
            'pic_id' => 'required'
        ];
        $validatedData = $request->validate($rules);

        AppModel::where('id', $id)->update($validatedData);

        return redirect('/app')->with('success', 'Application has been updated!');
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

        return redirect('/app')->with('success', 'Application has been deleted!');
    }
}
