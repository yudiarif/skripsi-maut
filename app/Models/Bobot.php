<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Bobot extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table='bobot';
    protected $primaryKey='id';
    protected $nilai_bobot;
    protected $kriteria_id;
    protected $user_id;

    protected $fillable=['user_id','kriteria_id','nilai_bobot'];

    public static function getBobot()
    {
        return self::all();
    }
    
    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function total()
    {
        return bobot::sum('nilai_bobot');
    }


}
