<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKriteria extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'sub_kriteria';
    protected $primaryKey = 'id';
    protected $rentang;
    protected $nilai;
    protected $kriteria_id; 
    protected $user_id;

    protected $fillable = [
        'rentang','nilai','kriteria_id','user_id'
    ];

    public static function getSubKriteria()
    {
        return self::all();
    }

    public function kriteria()
    {
        return $this->belongsTo(kriteria::class);
    }
    public function perhitungan()
    {
        return $this->hasMany(Perhitungan::class);
    }
}
