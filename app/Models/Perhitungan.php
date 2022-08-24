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
    protected $honorer_id;
    protected $kriteria_id;
    protected $subkriteria_id;

    protected $fillable = [
        'honorer_id','kriteria_id','subkriteria_id'
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
    public function tenagahonorer()
    {
        return $this->belongsTo(TenagaHonorer::class);
    }   

    public function getMaxMin()
    {
        return Perhitungan::max('subkriteria_id');
    }

    public function join()
    {
        return DB::table('perhitungan')->get();
    }

  

    


}
