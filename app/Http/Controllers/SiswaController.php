<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_trx_kelas;
use App\Models\M_data_sklh;
use App\Models\M_siswa;
use App\Models\User;
use App\Models\M_soal;
use App\Models\M_pembelajaran;

class SiswaController extends Controller
{
    public static function pembelajaranku()
    {
        $email = auth()->user()->email;
        $data = [
            'kelas' => M_trx_kelas::getkelasSiswa($email),
            'title' => M_data_sklh::getAll(),
            // 'guru' => User::getDataGuru(auth()->user()->id_guru),
            // 'mpl' => M_data_sklh::getMapel(),
        ];
        return view('Siswa.v_listmateri', $data);
        // dd($data['kelas']);
    }

    public static function masukmateri($k_enrol)
    {
        $data = [
            'materiku' => M_trx_kelas::getMateri($k_enrol),
            'title' => M_data_sklh::getAll(),
        ];
        return view('Siswa.v_masuk', $data);
        // dd($data['materiku']);
    }
}
