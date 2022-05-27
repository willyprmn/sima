<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            'title' => 'Pic',
            'pics' => PicModel::all()
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
            'title' => 'Create PIC',
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
        ]);

        // ddd($validatedData);

        PicModel::create($validatedData);

        return redirect('/pic')->with('success', 'New PIC has been added!');
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
            'title' => 'Pic',
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
        $rules = [
            'picName' => 'required|unique:pics|max:255',
            'akronim' => 'required|unique:pics|max:255'
        ];
        $validatedData = $request->validate($rules);

        PicModel::where('id', $id)->update($validatedData);

        return redirect('/pic')->with('success', 'PIC has been updated!');
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

        return redirect('/pic')->with('success', 'PIC has been deleted!');
    }
}
