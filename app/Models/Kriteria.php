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
    protected $kriteria;
    protected $users_id;

    protected $fillable = [
        'kode','kriteria','users_id'
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
