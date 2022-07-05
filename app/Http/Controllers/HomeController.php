<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_data_sklh;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'title' => M_data_sklh::getAll(),
        ];
        return view('home', $data);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $data = [
            'title' => M_data_sklh::getAll(),
        ];
        return view('adminHome', $data);
    }

    public function pengajarHome()
    {
        $data = [
            'title' => M_data_sklh::getAll(),
        ];
        return view('adminHome', $data);
    }
}
