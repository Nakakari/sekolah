<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\M_siswa;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->is_admin == 1) {
                return redirect()->route('admin.home');
            } elseif (auth()->user()->is_admin == 2) {
                return redirect()->route('pengajar.home');
            } else {
                return redirect()->route('home');
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Email-Address And Password Are Wrong.');
        }
    }
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
