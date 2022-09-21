<?php

namespace App\Http\Controllers;

use App\Models\Perhitungan;
use Illuminate\Http\Request;
use App\Models\CalonTenagaHonorer;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use App\Models\Bobot;
use App\Models\Hasil;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Session;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

class PerhitunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function __construct()
    {
        $this->cards = Perhitungan::select(['perhitungan.*','kriteria.kode as kode','sub_kriteria.nilai as nilai','calon_tenaga_honorer.nama as nama','perhitungan.id as id','calon_tenaga_honorer.id as idhonor'])
        ->join('kriteria','perhitungan.kriteria_id','=','kriteria.id')
        ->join('sub_kriteria','perhitungan.sub_kriteria_id','=','sub_kriteria.id')
        ->join('calon_tenaga_honorer','perhitungan.calon_tenaga_honorer_id','=','calon_tenaga_honorer.id')
        ->get()
        ->sortBy(['kode','asc']);

        $this->nilaiMax = DB::table('perhitungan') 
            ->select('perhitungan.*','kriteria.kode as kode','sub_kriteria.nilai as nilai','perhitungan.id as id')
            ->join('kriteria','perhitungan.kriteria_id','=','kriteria.id')
            ->join('sub_kriteria','perhitungan.sub_kriteria_id','=','sub_kriteria.id')
             ->whereRaw('nilai in (select max(nilai) from perhitungan group by (kode))')
             ->get()
            ->sortBy([['kode','asc'],['nilai','dsc']])
            ->unique('kode');
     
        $this->nilaiMin = DB::table('perhitungan') 
            ->select('perhitungan.*','kriteria.kode as kode','sub_kriteria.nilai as nilai','perhitungan.id as id')
            ->join('kriteria','perhitungan.kriteria_id','=','kriteria.id')
            ->join('sub_kriteria','perhitungan.sub_kriteria_id','=','sub_kriteria.id')
             ->whereRaw('nilai in (select min(nilai) from perhitungan group by (kode))')
             ->get()
            ->sortBy([['kode','asc'],['nilai','asc']])
             ->unique('kode');
             
             $this->report=[];
             $this->cards->each(function($item)use(&$report){
                 $this->report[$item->nama][$item->kode]=[
                     'honorer_id'=>$item->nama,
                     'kriteria_id'=>$item->kode,
                     'sub_kriteria_id'=>$item->nilai
                 ];
             });

             $this->maksimal=[];
             $this->nilaiMax->each(function($item)use(&$maksimal){
                $this->maksimal[$item->kode]= $item->nilai;
             });

             $this->minimal=[];
             $this->nilaiMin->each(function($item)use(&$minimal){
                $this->minimal[$item->kode]= $item->nilai;
             });

             $this->reportnilai=[];
             $this->cards->each(function($item)use(&$reportnilai){
                $this->reportnilai[$item->idhonor][$item->nama][$item->kode]= $item->nilai;
             });
             //dd($this->reportnilai);

           
            $this->normalisasi=[];
            foreach ($this->reportnilai as $k=>$v) 
            {
                foreach ($v as $keyb => $valueb)
                { 
                foreach ($valueb as $key => $value) 
                {
                    foreach ($this->minimal as $keymin => $valuemin) 
                    {
                        foreach ($this->maksimal as $keymax => $valuemax) 
                        {
                            if ($key===$keymin) 
                            {
                                if ($key===$keymax) 
                                {
                                    $this->normalisasi[$k][$keyb][$key]=(@round(($value-$valuemin)/($valuemax-$valuemin),4));
                                }
                            }
                        }
                    }
                }
                }
            }
            //dd($this->normalisasi);
            $this->kriteria=$this->cards->pluck('kode')
            ->sortBy('kode')
            ->unique();

    }

    public function index()
    {
        $subkriteria=SubKriteria::getSubkriteria();
        $nilai = Perhitungan::with('subkriteria')->get();
        $hasil= Hasil::getHasil();
        

        $total = Bobot::total();
        $kodekriteria = Kriteria::all();
        $bobot=Bobot::with('kriteria')->get();
        //dd($this->normalisasi,$this->maksimal,$this->minimal,$this->reportnilai);
        //dd($this->cards,$this->report,$this->maksimal,$this->normalisasi,$this->nbobot,$this->preferensi,$this->nilaipreferensi);
        $nilaiMax=$this->nilaiMax;
        $nilaiMin=$this->nilaiMin;
        //dd($nilaiMin);
        $kriteria=$this->kriteria;
        $cards=$this->cards;
        $report=$this->report;
        $normalisasi=$this->normalisasi;
        
        // $nbobot=$this->nbobot;
        // $preferensi=$this->preferensi;
        // $nilaipreferensi=$this->nilaipreferensi;
        //dd($nilaipreferensi);
        //dd($nilaiMin,$cards,$report);
        return view('hasil.index',compact('hasil','nilaiMin','nilaiMax','nilai','subkriteria','kriteria','bobot','total','cards','report','kodekriteria','normalisasi'));

    }
    
    public function perhitungan()
    {
        $subkriteria=SubKriteria::getSubkriteria();
        $nilai = Perhitungan::with('subkriteria')->get();
        //$hasil=Hasil::with('tenagahonorer')->get()->sortByDesc('nilai');
        $hasil = Hasil::select(['hasil.*','calon_tenaga_honorer.nama as nama'])
        ->join('calon_tenaga_honorer','hasil.calon_honorer_id','=','calon_tenaga_honorer.id')
        ->get()->sortByDesc('nilai');
        //dd($hasil);

        $total = Bobot::total();
        $kodekriteria = Kriteria::all();
        $bobot=Bobot::with('kriteria')->get();
        //dd($this->normalisasi,$this->maksimal,$this->minimal,$this->reportnilai);
        //dd($this->cards,$this->report,$this->maksimal,$this->normalisasi,$this->nbobot,$this->preferensi,$this->nilaipreferensi);
        $nilaiMax=$this->nilaiMax;
        $nilaiMin=$this->nilaiMin;
        $kriteria=$this->kriteria;
        $cards=$this->cards;
        $report=$this->report;
        $normalisasi=$this->normalisasi;
        // $nbobot=$this->nbobot;
        // $preferensi=$this->preferensi;
        // $nilaipreferensi=$this->nilaipreferensi;
        //dd($nilaipreferensi);
        

        return view('hasil.perhitungan',compact('hasil','nilaiMin','nilaiMax','nilai','subkriteria','kriteria','bobot','total','cards','report','kodekriteria','normalisasi'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bobotkriteria = Bobot::with('kriteria')->get();
        $kriteria = Kriteria::all();
        $bobot = Bobot::all();
        //$b=$bobot->pluck('bobot');
        //dd($b);
        $b = Kriteria::select(['kriteria.*','kriteria.nama_kriteria','bobot.nilai_bobot'])
        ->leftJoin('bobot','bobot.kriteria_id','=','kriteria.id')
        ->get();
        //dd($b);

        
        return view('bobot.index',compact('kriteria','bobot','bobotkriteria','b',));
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
        if (array_sum($data['nilai_bobot'])==1) {
            foreach($data['kriteria_id']as$item=>$value){
                $data1 =  array(
                    
                     'kriteria_id'=>$data['kriteria_id'][$item],
                     'nilai_bobot'=>$data['nilai_bobot'][$item],
                     'user_id'=>$data['user_id'][$item],
                );
                Bobot::updateOrCreate(['kriteria_id'=>$data['kriteria_id'][$item]], ['nilai_bobot'=>$data['nilai_bobot'][$item],
                                        'user_id'=>$data['user_id'][$item]
            
                                     ],$data1);
            }
           //dd($data);
            
            $normalisasibobot = Bobot::select(['kriteria.kode as kode','nilai_bobot'])
            ->join('kriteria','bobot.kriteria_id','=','kriteria.id')
            ->get();
    
            $nbt=$normalisasibobot->pluck('nilai_bobot')->toArray();
            $total=array_sum($nbt);
    
            $nbobot=[];
            $nbobot['total']=array_sum($nbt);
            $normalisasibobot->each(function($item)use(&$nbobot){
                $nbobot[$item->kode]= $item->nilai_bobot/$nbobot['total'];
            });
            //dd($nbobot);
    
            $preferensi=[];
            foreach ($this->normalisasi as $k => $v) {
                foreach ($v as $keyn => $valuen) {
                foreach ($valuen as $key => $value) {
                    foreach ($nbobot as $knbobot => $vnbobot) {
                        if ($key===$knbobot) {
                            //dd([$keyn]);
                            $preferensi[$k][$keyn][$key]=$vnbobot*$value;
                            //$preferensi[]=$vnbobot*$value;
                        }
                        
                    }
                    
                }
                }
            }
    
            $nilaipreferensi=[];
            foreach ($preferensi as $k => $v)
            { 
            foreach ($v as $key => $value) 
            {
                $nilaipreferensi[$k]=array_sum($value);
            }
            }
        //dd($data,$preferensi,$nilaipreferensi);
    
            $nilaipreferensi=$nilaipreferensi;
                foreach ($nilaipreferensi as $key => $value) {
                    $hasil= new Hasil;
                    $current_time = Carbon::now();
                    $user_id = auth()->user()->id;

                    // $hasil->honorer_id=$key;
                    // $hasil->nilai=@round(($value),4);
                    // $hasil->save();
                    $hasil->updateOrCreate(
                    ['calon_tenaga_honorer_id'=>$key],
                    ['nilai_hasil'=>@round(($value),3),
                     'user_id'=>$user_id,
                    'tgl_penilaian'=>$current_time
                    ]);
                }
            toast('Berhasil, Silahkan cek halaman Hasil Akhir untuk melihat hasil perhitungan','success');
        } else {
            alert()->error('Input Gagal','Bobot tidak sesuai, Total bobot lebih dari atau kurang dari 1. Silahkan input kembali');
        }
        //dd(array_sum($data['bobot']));
        return redirect()->route('bobot');

    }


}
