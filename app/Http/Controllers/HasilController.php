<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perhitungan;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use App\Models\Bobot;
use App\Models\TenagaHonorer;
use Illuminate\Support\Facades\DB;


class HasilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria=Kriteria::getKriteria();
        $subkriteria=SubKriteria::getSubkriteria();
        $nilai = Perhitungan::with('subkriteria')->get();
        //dd($nilai);
        return view('hasil.index',compact('nilai','kriteria','subkriteria'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // return DB::table('perhitungan')
        // ->join('sub_kriteria','perhitungan.id',"=",'perhitungan.subkriteria_id')
        // ->get();
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function perhitungan()
    {
        // $total = Bobot::total();
        // $max_min=Perhitungan::getMaxMin();
        // $bobot=Bobot::with('kriteria')->get();

        // $cards = Perhitungan::select(['perhitungan.*','kriteria.kode as kode','sub_kriteria.nilai as nilai','tenaga_honorer.nama as nama'])
        // ->join('kriteria','perhitungan.kriteria_id','=','kriteria.id')
        // ->join('sub_kriteria','perhitungan.subkriteria_id','=','sub_kriteria.id')
        // ->join('tenaga_honorer','perhitungan.honorer_id','=','tenaga_honorer.id')
        // ->get();
        
        // //dd($cards);

        // $report=[];
        // $cards->each(function($item)use(&$report){
        //     $report[$item->nama][$item->kode]=[
                
        //         'subkriteria_id'=>$item->nilai
        //     ];
        // });

        // $kriteria=$cards->pluck('kode')
        // ->sortBy('kode')
        // ->unique();

        // //dd($report,$kriteria,$cards);

        // return view('hasil.perhitungan',compact('max_min','kriteria','bobot','total','cards','report'));
    }

    
}
