<?php

namespace App\Http\Controllers;

use App\Models\Bobot;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Session;

class BobotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
    $this->variable=[];
    }

    public function index()
    {
        $bobotkriteria = Bobot::with('kriteria')->get();
        $kriteria = Kriteria::all();
        $bobot = Bobot::all();
        return view('bobot.index',compact('kriteria','bobot','bobotkriteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function coba()
    {
        dd($this->variable);
    }

    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        //dd($data);
        foreach($data['kriteria_id']as$item=>$value){
            $data1 =  array(
                'users_id'=>$data['users_id'][$item],
                 'kriteria_id'=>$data['kriteria_id'][$item],
                 'bobot'=>$data['bobot'][$item],
            );
            Bobot::updateOrCreate(['kriteria_id'=>$data['kriteria_id'][$item]], ['bobot'=>$data['bobot'][$item]],$data1);
        }
        // $request->validate([
        //     'user_id',
        //     'kriteria_id',
        //     'bobot'
        // ]);
        // Bobot::create($request->all());
        
        return redirect()->route('bobot.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bobot  $bobot
     * @return \Illuminate\Http\Response
     */
    public function show(Bobot $bobot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bobot  $bobot
     * @return \Illuminate\Http\Response
     */
    public function edit(Bobot $bobot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bobot  $bobot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bobot $bobot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bobot  $bobot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bobot $bobot)
    {
        //
    }
}
