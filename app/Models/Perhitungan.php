<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Perhitungan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'perhitungan';
    protected $primaryKey = 'id';
    protected $calon_tenaga_honorer_id;
    protected $kriteria_id;
    protected $sub_kriteria_id;

    protected $fillable = [
        'calon_tenaga_honorer_id','kriteria_id','sub_kriteria_id'
    ];

    public static function getPerhitungan()
    {
        return self::all();
    }
    
    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }   
    public function subkriteria()
    {
        return $this->belongsTo(SubKriteria::class);
    }   
    public function calontenagahonorer()
    {
        return $this->belongsTo(CalonTenagaHonorer::class);
    }   

    // public function getMaxMin()
    // {
    //     return Perhitungan::max('sub_kriteria_id');
    // }

    // public function join()
    // {
    //     return DB::table('perhitungan')->get();
    // }

  

    


}
