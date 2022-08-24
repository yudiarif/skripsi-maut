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
    protected $honorer_id;
    protected $nilai;

    protected $fillable = [
        'honorer_id','nilai'
    ];

}
