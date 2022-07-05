<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_trx_kelas;
use App\Models\M_data_sklh;
use App\Models\M_siswa;
use App\Models\User;
use App\Models\M_soal;
use App\Models\M_pembelajaran;
use App\Imports\SiswaImport;
use App\Imports\SoalImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Auth;

use Illuminate\Support\Facades\DB;

class PengajarController extends Controller
{
    public function dataKelas()
    {
        $id_guru = auth()->user()->id_guru;
        $data = [
            'kelas' => M_trx_kelas::getkelasGuru($id_guru),
            'jmlsiswa' => M_trx_kelas::jmlsiswa(),
            'title' => M_data_sklh::getAll(),
            // 'guru' => User::getDataGuru(auth()->user()->id_guru),
            // 'mpl' => M_data_sklh::getMapel(),
        ];
        return view('Pengajar.v_listkelas', $data);
        // dd(auth()->user()->is_admin);
    }

    public function addKelas(Request $request)
    {
        $this->validate($request, [
            'kelas' => ['required', 'string', 'max:255'],
            'mapel' => 'required',
            'k_enrol' => ['required', 'unique:trx_kelas'],
            // 'id_guru' => 'required',
            'excel_siswa' => 'required|file|mimes:xlsx,xls'
        ]);

        $data = new M_trx_kelas();
        $data->kelas = $request->get('kelas');
        $data->k_enrol = $request->get('k_enrol');
        $data->id_guru = auth()->user()->id_guru;
        $data->mapel = $request->get('mapel');

        $data->save();

        $file = $request->file('excel_siswa');
        // $nama_file = time() . "_" . $file->getClientOriginalName();
        // $tujuan_upload = 'excel_siswa';
        // $file->move($tujuan_upload, $nama_file);
        // dd($file);/
        Excel::import(new SiswaImport, $file);

        return redirect()->back();
        // dd(auth()->user()->id_guru);
    }

    public function editKelas(Request $request, $id_trx_kelas)
    {
        $this->validate($request, [
            'kelas' => ['required', 'string', 'max:255'],
            'mapel' => 'required',
            // 'id_guru' => 'required',
            // 'excel_siswa' => 'required|file|mimes:csv,xlsx,xls'
        ]);

        // $file = $request->file('excel_siswa');

        $data = M_trx_kelas::find($id_trx_kelas);
        // $dataa = User::find($request->get('kelas'));
        $data->kelas = $request->get('kelas');
        $data->id_guru = auth()->user()->id_guru;
        $data->mapel = $request->get('mapel');
        // $data->update();

        $data->update();

        return redirect()->back();
    }

    public function hapusKelas(Request $request, $id_trx_kelas)
    {
        $this->validate($request, [
            'kelas' => ['required', 'string', 'max:255'],
            'mapel' => 'required',
            // 'excel_siswa' => 'required|file|mimes:xlsx,xls'
        ]);

        // $data->kelas = $request->get('kelas');
        // $data->mapel = $request->get('mapel');
        // $file = $request->file('excel_siswa');

        DB::transaction(function () use ($id_trx_kelas): void {

            DB::table('trx_kelas')->whereIn('id_trx_kelas', array('id_trx_kelas' => $id_trx_kelas))->delete();

            DB::table('siswa')
                ->whereIn('kelas', array('kelas' => request()->get('kelas')))
                ->whereIn('mapel', array('mapel' => request()->get('mapel')))
                ->delete();

            // Excel::import(new SiswaImport, $file);
        });

        return redirect()->back();
    }

    public function exportSiswa(Request $request, $k_enrol)
    {
        // $a = M_trx_kelas::where('id_trx_kelas', $id_trx_kelas)->first();
        // $mapel = $a->mapel;
        $data = [
            'siswa' => M_siswa::getExport($k_enrol),
        ];
        return view('Pengajar.v_exportsiswa', $data);
        // dd($data['siswa']);
    }

    public function detailSiswa(Request $request, $k_enrol)
    {
        $data = [
            'title' => M_data_sklh::getAll(),
            'identitas' => M_data_sklh::getIdentitas($k_enrol),
            "siswa" => M_data_sklh::getSiswa($k_enrol)
        ];
        return view('Pengajar.v_listsiswa', $data);
    }

    public function pembelajaran(Request $request)
    {
        $id_guru = auth()->user()->id_guru;
        $data = [
            'title' => M_data_sklh::getAll(),
            'kelas' => M_trx_kelas::getkelasGuru($id_guru),
            'jmlsiswa' => M_trx_kelas::jmlsiswa(),
            'pembelajaran' => M_pembelajaran::getAll(),
        ];
        return view('Pengajar.v_pembelajaran', $data);
        // dd(count([$data['pembelajaran']]));
    }

    public function tambahMateri($k_enrol)
    {
        $data = [
            'title' => M_data_sklh::getAll(),
            'cek' => M_pembelajaran::getDetail($k_enrol),
            'kelas' => M_trx_kelas::getAll(),
            'jmlsiswa' => M_trx_kelas::jmlsiswa(),
            'identitas' => M_data_sklh::getIdentitas($k_enrol),
        ];
        return view('Pengajar.v_tambahMateri', $data);
        // dd($data['cek']);
    }

    public function uploadMateri(Request $request)
    {
        $this->validate($request, [
            'judul' => ['required', 'string', 'max:255'],
            'k_enrol' => 'required',
            'mode' => 'required',
            'pewaktu' => 'required',
            'kode_soal' => ['required', 'unique:materi'],
            'kata_pengantar' => 'required',
            'link_materi' => 'required',
            'file_soal' => 'required|file|mimes:xlsx,xls'
        ]);
        $file = $request->file('file_soal');

        if ($request->hasFile('file_soal')) {
            $data = new M_pembelajaran();
            $data->judul = $request->get('judul');
            $data->k_enrol = $request->get('k_enrol');
            $data->mode = $request->get('mode');
            $data->kode_soal = $request->get('kode_soal');
            $data->pewaktu = $request->get('pewaktu');
            $data->kata_pengantar = $request->get('kata_pengantar');
            $data->link_materi = $request->get('link_materi');
            $data->id_guru = auth()->user()->id_guru;

            $data->save();

            Excel::import(new SoalImport, $file);

            return redirect()->back()->with('pesan', 'Data Berhasil Diupdate!!');
        } else {
            return redirect()->back()->with('gagal', 'Data Berhasil Diupdate!!');
        }
    }

    public function updateMateri(Request $request, $id_materi)
    {
        $this->validate($request, [
            'judul' => ['required', 'string', 'max:255'],
            'k_enrol' => 'required',
            'mode' => 'required',
            'pewaktu' => 'required',
            'kode_soal' => ['required'],
            'kata_pengantar' => 'required',
            'link_materi' => 'required',
            // 'file_soal' => 'required|file|mimes:xlsx,xls'
        ]);
        $data = M_pembelajaran::find($id_materi);
        $data->judul = $request->get('judul');
        $data->k_enrol = $request->get('k_enrol');
        $data->mode = $request->get('mode');
        $data->kode_soal = $request->get('kode_soal');
        $data->pewaktu = $request->get('pewaktu');
        $data->kata_pengantar = $request->get('kata_pengantar');
        $data->link_materi = $request->get('link_materi');
        $data->id_guru = auth()->user()->id_guru;

        $data->update();
        return redirect()->back()->with('pesan', 'Data Berhasil Diupdate!!');
    }

    public function exportSoal(Request $request, $kode_soal)
    {
        $data = [
            'soal' => M_soal::getExport($kode_soal),
        ];
        return view('Pengajar.v_exportsoal', $data);
        // dd($data['siswa']);
    }

    public function detailSoal($kode_soal)
    {
        $data = [
            'title' => M_data_sklh::getAll(),
            'identitas' => M_pembelajaran::getDetail2($kode_soal),
            "soal" => M_soal::getExport($kode_soal)
        ];
        return view('Pengajar.v_listsoal', $data);
        // dd($data['identitas']);
    }
}
