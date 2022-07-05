<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nis', 'name', 'kelas', 'email', 'mapel', 'k_enrol'
    ];
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    public $timestamps = false;

    public static function getExport($k_enrol)
    {
        return DB::table('users')
            ->select('*')
            ->where('users.k_enrol', $k_enrol)
            ->get();
    }

    public static function getUser($id)
    {
        return DB::table('siswa')
            ->select('*')
            ->where('id_siswa', $id)
            ->get();
    }
}
