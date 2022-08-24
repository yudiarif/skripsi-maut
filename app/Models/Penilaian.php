<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Penilaian extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'penilaian';
    protected $primaryKey = 'id';
    protected $alternatif_id;
    protected $kriteria_id;
    protected $subkriteria_id;

    protected $fillable = [
        'alternatif_id','kriteria_id','subkriteria_id'
    ];

    public static function getPenilaian()
    {
        return self::all();
    }


    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }   
    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }   
    public function subkriteria()
    {
        return $this->belongsTo(SubKriteria::class);
    }   
}
