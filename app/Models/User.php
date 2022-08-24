<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // public $timestamps = true;
    // protected $table = 'users';
    // protected $primaryKey = 'id';
    // protected $nama;
    // protected $role_id;
    // protected $email;
    // protected $username;
    // protected $password;

    protected $fillable = [
        'email','nama','username','password','role_id'
    ];

    protected $hidden=[
        'password','remember_token'
    ];
    
  

    public static function getUser()
    {
        return self::all();
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

}
