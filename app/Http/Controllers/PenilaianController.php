<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Alternatif;
use App\Models\SubKriteria;
use App\Models\Penilaian;
use Illuminate\Support\Facades\DB;


class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alternatif=Alternatif::with(['penilaian:id,alternatif_id,kriteria_id,subkriteria_id'])->get();
        $subkriteria = SubKriteria::getSubKriteria();
        $kriteria = Kriteria::with('subkriteria')->get();
        $penilaian = Penilaian::with(['subkriteria:id,deskripsi'])->get();
        
        return view ('penilaian.index',compact('alternatif','kriteria','penilaian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->kriteria_id as $key => $kriteria_id) 
        {
            $penilaian= new Penilaian;
            $penilaian->kriteria_id=$request->kriteria_id[$key];
            $penilaian->alternatif_id=$request->alternatif_id[$key];
            $penilaian->subkriteria_id=$request->subkriteria_id[$key];
            $penilaian->save();
        }
        return redirect()->route('penilaian.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $alternatif_id)
    {
        // Penilaian::where('alternatif_id',$alternatif_id)->delete();
        // foreach ($request->kriteria_id as $key => $kriteria_id) 
        // {
        //     $penilaian= new Penilaian;
        //     $penilaian->kriteria_id=$request->kriteria_id[$key];
        //     $penilaian->alternatif_id=$request->alternatif_id[$key];
        //     $penilaian->nilai=$request->nilai[$key];
        //     $penilaian->save();
        // }
        // return redirect()->route('penilaian.index');

        Penilaian::where('alternatif_id',$request->alternatif_id)->first();
        
        //  if(count($request->sub_kriteria_id)>0){
            foreach ($request->alternatif_id as $key => $value){
                $data2=array(
                    'kriteria_id'=> $request->kriteria_id[$key],
                    'subkriteria_id'=> $request->subkriteria_id[$key]
                );
               Penilaian::where('kriteria_id',$request->kriteria_id[$key])
                        ->where('alternatif_id',$request->alternatif_id[$key])->updateOrCreate(['alternatif_id'=>$alternatif_id], $data2);
                // Penilaian::find($kriteria_id)->update($data2);
            }

            
        //}
        // foreach ($request->alternatif_id as $key => $alternatif_id)
        // {
        //     $value= Penilaian::find($alternatif_id);
        //     $value->nilai=$request->nilai[$key];
        //     // $nilai = Penilaian::where('alternatif_id',$alternatif_id)->first();
        //     // $nilai->update(['nilai'=>$nilai]);
            
           
        //     $value->save();
        // }
        
        return redirect()->route('penilaian.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($alternatif_id)
    {
        Penilaian::where('alternatif_id',$alternatif_id)->delete();
        return redirect()->route('penilaian.index');
    }
}
