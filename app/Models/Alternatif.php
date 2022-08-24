<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'alternatif';
    protected $primaryKey = 'id';
    protected $email;
    protected $nama;
    protected $jenis_kelamin;
    protected $asal_kota;
    protected $alamat;
    protected $no_hp;


    protected $fillable = [
        'email','nama','jenis_kelamin','asal_kota','alamat','no_hp'
    ];

    public static function getAlternatif()
    {
        return self::all();
    }

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class);
    }
}