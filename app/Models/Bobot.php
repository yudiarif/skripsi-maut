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
    protected $users_id;
    protected $kriteria_id;
    protected $bobot;

    protected $fillable=['users_id','kriteria_id','bobot'];

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
        return bobot::sum('bobot');
    }

    // public function normalisasi()
    // {
    //     $total = Bobot::sum('bobot');
    //     $bobot = Bobot::get('bobot');
    //     foreach ($bobot as $key => $value) {
    //         $value/$total;
    //     };
    // }
    

}
