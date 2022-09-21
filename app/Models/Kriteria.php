<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'kriteria';
    protected $primaryKey = 'id';
    protected $kode;
    protected $nama_kriteria;
    protected $user_id;

    protected $fillable = [
        'kode','nama_kriteria','user_id'
    ];

    public static function getKriteria()
    {
        return self::all();
    }

    public function subkriteria()
    {
        return $this->hasMany(SubKriteria::class);
    }
    public function perhitungan()
    {
        return $this->hasMany(Perhitungan::class);
    }

    

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class);
    }
}
