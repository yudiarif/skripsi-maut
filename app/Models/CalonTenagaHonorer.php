<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonTenagaHonorer extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'calon_tenaga_honorer';
    protected $primaryKey = 'id';
    protected $nama;
    protected $jenis_kelamin;
    protected $asal_kota;
    protected $alamat;
    protected $no_hp;
    protected $email;
    protected $user_id;


    protected $fillable = [
        'user_id','email','nama','jenis_kelamin','asal_kota','alamat','no_hp'
    ];

    public static function getCalonTenagaHonorer()
    {
        return self::all();
    }

    public function perhitungan()
    {
        return $this->hasMany(Perhitungan::class);
    }

}
