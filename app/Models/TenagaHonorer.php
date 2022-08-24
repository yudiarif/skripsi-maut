<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenagaHonorer extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tenaga_honorer';
    protected $primaryKey = 'id';
    protected $users_id;
    protected $email;
    protected $nama;
    protected $jenis_kelamin;
    protected $asal_kota;
    protected $alamat;
    protected $no_hp;


    protected $fillable = [
        'users_id','email','nama','jenis_kelamin','asal_kota','alamat','no_hp'
    ];

    public static function getTenagaHonorer()
    {
        return self::all();
    }

    public function perhitungan()
    {
        return $this->hasMany(Perhitungan::class,'honorer_id');
    }

}
