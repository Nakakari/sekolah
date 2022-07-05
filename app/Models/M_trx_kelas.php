<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_trx_kelas extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_kelas', 'id_mapel', 'jml_siswa', 'id_guru'
    ];
    protected $table = 'trx_kelas';
    protected $primaryKey = 'id_trx_kelas';
    public $timestamps = false;

    public static function getAll()
    {
        return DB::table('trx_kelas')
            ->select('*')
            // ->join('siswa', 'trx_kelas.kelas', '=', 'siswa.kelas')
            // ->join('mapel', 'mapel.id_mapel', '=', 'trx_kelas.id_mapel')
            ->get();
    }

    public static function getkelasGuru($id_guru)
    {
        return DB::table('trx_kelas')
            ->select('*')
            // ->join('siswa', 'trx_kelas.kelas', '=', 'siswa.kelas')
            // ->join('mapel', 'mapel.id_mapel', '=', 'trx_kelas.id_mapel')
            ->where('id_guru', $id_guru)
            ->get();
    }

    public static function getkelasSiswa($email)
    {
        return DB::table('siswa')
            ->select('*')
            ->join('materi', 'materi.k_enrol', '=', 'siswa.k_enrol')
            ->join('trx_kelas', 'trx_kelas.k_enrol', '=', 'siswa.k_enrol')
            ->where('siswa.email', $email)
            ->get();
    }
    public static function getMateri($k_enrol)
    {
        return DB::table('materi')
            ->select('*')
            ->join('trx_kelas', 'trx_kelas.k_enrol', '=', 'materi.k_enrol')
            ->where('materi.k_enrol', $k_enrol)
            ->first();
    }

    public static function getJenisKls()
    {
        return DB::table('kelas')
            ->select('*')
            ->get();
    }

    public static function jmlsiswa()
    {
        return DB::table('siswa')
            ->select(
                'siswa.k_enrol',
                DB::raw('COUNT(*) as jumlah')
            )
            // ->join('relasi', 'posts.cat', '=', 'relasi.id_relasi')
            ->groupBy('k_enrol')
            ->get();
    }
}
