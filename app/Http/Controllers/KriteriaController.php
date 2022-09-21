<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;


class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = Kriteria::getKriteria();
        return view ('kriteria.index',compact('kriteria'));
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
            'kode'=>'required',
            'nama_kriteria'=>'required',
            'user_id'=>'required'
        ]);
        Kriteria::create($request->all());
        toast('Data berhasil diinput','success');
        return redirect()->route('kriteria.index');

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
            'kode'=>'required',
            'nama_kriteria'=>'required',
            'user_id'=>'required'
        ]);
        Kriteria::find($id)->update($request->all());
        toast('Data berhasil diedit','info');
        return redirect()->route('kriteria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kriteria::find($id)->delete();
        toast('Data berhasil dihapus','info');
        return redirect()->route('kriteria.index');
    }
}
