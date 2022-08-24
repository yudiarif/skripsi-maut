<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'role';
    protected $primaryKey = 'id';
    protected $level_user;

    protected $fillable = ['user_id','level_user'];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

}

