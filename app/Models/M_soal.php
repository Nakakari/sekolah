<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_soal extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_soal', 'soal', 'opsi_satu', 'opsi_dua', 'opsi_tiga', 'opsi_empat', 'kunci', 'skor', 'pembahasan',
    ];
    protected $table = 'soal';
    protected $primaryKey = 'id_soal';
    public $timestamps = false;

    public static function getExport($kode_soal)
    {
        return DB::table('soal')
            ->select('*')
            ->where('soal.kode_soal', $kode_soal)
            ->get();
    }
}
