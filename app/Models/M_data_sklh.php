<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_data_sklh extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_sklh', 'almt_sklh', 'nama_app_sklh', 'foto_sklh'
    ];
    protected $table = 'data_sklh';
    protected $primaryKey = 'id_data_sklh';
    public $timestamps = false;

    public static function getAll()
    {
        return DB::table('data_sklh')
            ->select('*')
            ->first();
    }

    public static function getKls()
    {
        return DB::table('kelas')
            ->select('*')
            ->get();
    }

    public static function getMapel()
    {
        return DB::table('mapel')
            ->select('*')
            ->get();
    }

    public static function getAllData()
    {
        return DB::table('data_sklh')
            ->select('*')

            ->get();
    }
    public static function getSiswa($k_enrol)
    {
        return DB::table('siswa')
            ->select('*')
            ->where('siswa.k_enrol', $k_enrol)
            ->get();
    }
    public static function getIdentitas($k_enrol)
    {
        return DB::table('siswa')
            ->select('*')
            ->where('siswa.k_enrol', $k_enrol)
            ->first();
    }
}
