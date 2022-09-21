<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubKriteria;
use App\Models\Kriteria;


class SubkriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subkriteria = SubKriteria::getSubKriteria();
        $kriteria = Kriteria::with('subkriteria')->get();
        return view('subkriteria.index',compact('subkriteria','kriteria'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kriteria_id'=>'required',
            'rentang'=>'required',
            'nilai'=>'required',
            'user_id'=>'required'
        ]);
        SubKriteria::create($request->all());
        toast('Data berhasil diinput','success');
        return redirect()->route('sub-kriteria.index');
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
        $request->validate([
            'rentang'=>'required',
            'nilai'=>'required',
            'user_id'=>'required'

        ]);
        SubKriteria::find($id)->update($request->all());
        toast('Data berhasil diedit','info');
        return redirect()->route('sub-kriteria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubKriteria::find($id)->delete();
        toast('Data berhasil dihapus','info');
        return redirect()->route('sub-kriteria.index');
    }
}
