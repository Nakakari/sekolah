<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_siswa;

class LoginSiswaController extends Controller
{
    public function AuthCheckSiswa(Request $request)
    {
        $this->validate(
            $request,
            ['email' => 'required'],
            ['password' => 'required']

        );

        $email = $request->input('email');
        $pass = $request->input('password');

        $users = DB::table('siswa')->where(['email' => $email])->first();

        if (count(array($users)) == 0) {

            return redirect('/')->with('failed', 'Login gagal');
        } else
               
        if (
            $users->email == $email and $users->password == $pass
        ) {
            // dd($users->id);
            $id = $users->id_siswa;
            // Session::put('login', 'Selamat anda berhasil login');
            $data = [
                'email' => $email,
                // "nama" => $users->name,
                "akun" => M_siswa::getUser($id),
            ];
            return view('Siswa.v_loginsiswa', $data);
            // dd($data['akun']);
        } else {

            return redirect('/')->with('failed', 'Login gagal');
        }
    }
}
