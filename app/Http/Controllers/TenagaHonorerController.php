<?php

namespace App\Http\Controllers;

use App\Models\CalonTenagaHonorer;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use App\Models\Perhitungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TenagaHonorerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenaga_honorer = CalonTenagaHonorer::with('perhitungan')->get();
        $subkriteria = SubKriteria::getSubKriteria();
        $kriteria = Kriteria::with('subkriteria')->get();
        $perhitungan = Perhitungan::all();
        // $perhitungan = Perhitungan::all();
        return view ('tenaga_honorer.index',compact('tenaga_honorer','kriteria','subkriteria','perhitungan'));
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

        // $request->validate([
        //     'nama'=>'required',
        //     'jenis_kelamin'=>'required',
        //     'asal_kota'=>'required',
        //     'no_hp'=>'required',
        //     'email'=>'required',
        //     'alamat'=>'required',
        //     'users_id'=>'required',
        // ]);
        // TenagaHonorer::create($request->all());
        $data=$request->all();
        //dd($data);
        $tenaga_honorer= new TenagaHonorer;
        $tenaga_honorer->nama=$data['nama'];
        $tenaga_honorer->jenis_kelamin=$data['jenis_kelamin'];
        $tenaga_honorer->asal_kota=$data['asal_kota'];
        $tenaga_honorer->no_hp=$data['no_hp'];
        $tenaga_honorer->email=$data['email'];
        $tenaga_honorer->alamat=$data['alamat'];
        $tenaga_honorer->users_id=$data['users_id'];
        $tenaga_honorer->save();

        if($request->kriteria_id){
            foreach($data['kriteria_id']as$item=>$value){
                $data1 =  array(
                     'honorer_id'=>$tenaga_honorer->id,
                     'kriteria_id'=>$data['kriteria_id'][$item],
                     'subkriteria_id'=>$data['subkriteria_id'][$item],
                );
                Perhitungan::create($data1);
            }
        }
        
        toast('Data berhasil diinput','success');
        return redirect()->route('calon-tenaga-honorer.index');
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
    public function update(Request $request, $id)
    {
        $data=$request->all();   
        $tenaga_honorer = TenagaHonorer::with('Perhitungan')->find($id);
        // $tenaga_honorer = TenagaHonorer::find($id);
        $tenaga_honorer->nama=$data['nama'];
        $tenaga_honorer->jenis_kelamin=$data['jenis_kelamin'];
        $tenaga_honorer->asal_kota=$data['asal_kota'];
        $tenaga_honorer->no_hp=$data['no_hp'];
        $tenaga_honorer->email=$data['email'];
        $tenaga_honorer->alamat=$data['alamat'];
        $tenaga_honorer->users_id=$data['users_id'];
        $tenaga_honorer->update($data);

            foreach($data['honorer_id']as$item=>$value){
                $data2 =  array(
                    'honorer_id'=>$data['honorer_id'][$item],
                    'kriteria_id'=>$data['kriteria_id'][$item],
                    'subkriteria_id'=>$data['subkriteria_id'][$item]
                );
                //dd($data);
                // Perhitungan::where('kriteria_id',$request->kriteria_id[$item])
                //            ->where('honorer_id',$request->honorer_id[$item])
                //            ->update($data2);
                Perhitungan::updateOrCreate(['honorer_id'=>$data['honorer_id'][$item],'kriteria_id'=>$data['kriteria_id'][$item]],$data2);
                
            }




        toast('Data berhasil diedit','info');
        return redirect()->route('calon-tenaga-honorer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TenagaHonorer::find($id)->delete();
        toast('Data berhasil dihapus','info');
        return redirect()->route('calon-tenaga-honorer.index');
    }
}
