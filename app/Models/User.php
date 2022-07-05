<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin', 'jk', 'alamat', 'foto'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function isAdmin()
    {
        return DB::table('users')
            ->select('*')
            ->join('jenis_kelamin', 'users.jk', '=', 'jenis_kelamin.id_jk')
            ->where('is_admin', 1)
            ->get();
    }

    public static function isPengajar()
    {
        return DB::table('users')
            ->select('*')
            ->join('jenis_kelamin', 'users.jk', '=', 'jenis_kelamin.id_jk')
            ->where('is_admin', 2)
            ->get();
    }

    public static function jekal()
    {
        return DB::table('jenis_kelamin')
            ->select('*')
            ->get();
    }
}
