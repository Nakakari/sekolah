<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\M_data_sklh;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dataAdmin()
    {
        $data = [
            'admin' => User::isAdmin(),
            'jk' => User::jekal(),
            'title' => M_data_sklh::getAll(),
        ];
        return view('Admin.v_listAdmin', $data);
        // dd($data['title']);
    }

    public function addAdmin(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'jk' => 'required',
            'alamat' => 'required',
            'password' => ['required', 'string', 'min:8'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'is_admin' => 'required',
            'foto' => 'required|file|image|mimes:jpeg,png,jpg',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('foto');

        $nama_file = time() . "_" . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'foto_user';
        $file->move($tujuan_upload, $nama_file);

        $data = new User();
        $data->name = $request->get('name');
        $data->is_admin = $request->get('is_admin');
        $data->jk = $request->get('jk');
        $data->password = Hash::make($request->get('password'));
        $data->alamat = $request->get('alamat');
        $data->email = $request->get('email');
        $data->foto = $nama_file;

        $data->save();

        return redirect()->back();
    }

    public function updateAdmin(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'jk' => 'required',
            'alamat' => 'required',
            'password' => ['required', 'string', 'min:8'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'is_admin' => 'required',
            'foto' => 'required|file|image|mimes:jpeg,png,jpg',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('foto');

        $nama_file = time() . "_" . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'foto_user';
        $file->move($tujuan_upload, $nama_file);

        $data =  User::find($id);
        $data->name = $request->get('name');
        $data->is_admin = $request->get('is_admin');
        $data->jk = $request->get('jk');
        $data->password = Hash::make($request->get('password'));
        $data->alamat = $request->get('alamat');
        $data->email = $request->get('email');
        $data->foto = $nama_file;

        $data->update();

        return redirect()->back();
    }

    public function hapusAdmin($id)
    {
        // dd($id);
        DB::table('users')->where('id', $id)->delete();
        return redirect()->back();
        // dd($item);
    }

    public function dataPengajar()
    {
        $data = [
            'pengajar' => User::isPengajar(),
            'jk' => User::jekal(),
            'title' => M_data_sklh::getAll(),
        ];
        return view('Admin.v_listPengajar', $data);
        // dd($data['pengajar']);
    }

    public function addPengajar(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'jk' => 'required',
            'alamat' => 'required',
            'password' => ['required', 'string', 'min:8'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'is_admin' => 'required',
            'id_guru' => 'required',
            'foto' => 'required|file|image|mimes:jpeg,png,jpg',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('foto');

        $nama_file = time() . "_" . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'foto_user';
        $file->move($tujuan_upload, $nama_file);

        $data = new User();
        $data->name = $request->get('name');
        $data->is_admin = $request->get('is_admin');
        $data->jk = $request->get('jk');
        $data->password = Hash::make($request->get('password'));
        $data->alamat = $request->get('alamat');
        $data->id_guru = $request->get('id_guru');
        $data->email = $request->get('email');
        $data->foto = $nama_file;

        $data->save();

        return redirect()->back();
    }

    public function updatePengajar(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'jk' => 'required',
            'alamat' => 'required',
            'password' => ['required', 'string', 'min:8'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'is_admin' => 'required',
            'id_guru' => 'required',
            'foto' => 'required|file|image|mimes:jpeg,png,jpg',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('foto');

        $nama_file = time() . "_" . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'foto_user';
        $file->move($tujuan_upload, $nama_file);

        $data =  User::find($id);
        $data->name = $request->get('name');
        $data->is_admin = $request->get('is_admin');
        $data->jk = $request->get('jk');
        $data->password = Hash::make($request->get('password'));
        $data->alamat = $request->get('alamat');
        $data->id_guru = $request->get('id_guru');
        $data->email = $request->get('email');
        $data->foto = $nama_file;

        $data->update();

        return redirect()->back();
    }

    public function dataSekolah()
    {
        $data = [
            'sklh' => M_data_sklh::getAllData(),
            'title' => M_data_sklh::getAll(),
        ];
        return view('Admin.v_listdatasekolah', $data);
    }

    public function adddataSekolah(Request $request)
    {
        $this->validate($request, [
            'nama_sklh' => ['required', 'string', 'max:255'],
            'almt_sklh' => 'required',
            'nama_app_sklh' => 'required',
            'foto_sklh' => 'required|file|image|mimes:jpeg,png,jpg,ico,svg',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('foto_sklh');

        $nama_file = time() . "_" . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'foto_sklh';
        $file->move($tujuan_upload, $nama_file);

        $data = new M_data_sklh();
        $data->nama_sklh = $request->get('nama_sklh');
        $data->almt_sklh = $request->get('almt_sklh');
        $data->nama_app_sklh = $request->get('nama_app_sklh');
        $data->foto_sklh = $nama_file;

        $data->save();

        return redirect()->back();
    }

    public function updatedataSekolah(Request $request, $id_data_sklh)
    {
        $this->validate($request, [
            'nama_sklh' => ['required', 'string', 'max:255'],
            'almt_sklh' => 'required',
            'nama_app_sklh' => 'required',
            'foto_sklh' => 'required|file|image|mimes:jpeg,png,jpg,ico,svg',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('foto_sklh');

        $nama_file = time() . "_" . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'foto_sklh';
        $file->move($tujuan_upload, $nama_file);

        $data = M_data_sklh::find($id_data_sklh);
        $data->nama_sklh = $request->get('nama_sklh');
        $data->almt_sklh = $request->get('almt_sklh');
        $data->nama_app_sklh = $request->get('nama_app_sklh');
        $data->foto_sklh = $nama_file;

        $data->update();

        return redirect()->back();
    }

    public function import()
    {
        Excel::import(new SiswaImport, 'siswa.xlsx');

        // return redirect('/')->with('success', 'All good!');
    }
}
