<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'hasil';
    protected $primaryKey = 'id';
    protected $nilai_hasil;
    protected $tgl_penilaian;
    protected $calon_tenaga_honorer_id;
    protected $user_id;

    protected $dates = ['tgl_penilaian'];
    protected $fillable = [
        'calon_tenaga_honorer_id','nilai_hasil','tgl_penilaian','user_id'
    ];

    public function getHasil()
    {
        return Hasil::select(['hasil.*','calon_tenaga_honorer.nama as nama'])
        ->join('calon_tenaga_honorer','hasil.calon_tenaga_honorer_id','=','calon_tenaga_honorer.id')
        ->get()->sortByDesc('nilai');
    }

}
