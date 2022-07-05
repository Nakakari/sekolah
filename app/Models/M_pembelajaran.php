<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_pembelajaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul', 'model', 'pewaktu', 'kata_pengantar', 'link_materi', 'kode_soal', 'id_guru'
    ];
    protected $table = 'materi';
    protected $primaryKey = 'id_materi';
    public $timestamps = false;

    public static function getAll()
    {
        return DB::table('materi')
            ->select('*')
            ->get();
    }

    public static function getDetail($k_enrol)
    {
        return DB::table('materi')
            ->select('*')
            ->where('k_enrol', $k_enrol)
            ->get();
    }

    public static function getDetail2($kode_soal)
    {
        return DB::table('materi')
            ->select('*')
            ->join('trx_kelas', 'trx_kelas.k_enrol', '=', 'trx_kelas.k_enrol')
            ->where('materi.kode_soal', $kode_soal)
            ->first();
    }
}
