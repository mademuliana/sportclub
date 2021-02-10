<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kegiatan;
use App\Models\Anggota;
use App\Models\User;
use App\Models\Prestasi;
use App\Models\Presensi;
use App\Models\Sport_Club;

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
        $kegiatans = DB::table('kegiatans')->orderBy('id', 'DESC')->paginate(10);
        $presensi = Presensi::all();
        $anggotas = Anggota::all();
        $users = User::all();
        $sportclubs = Sport_Club::all();

        $id_auth= auth()->id();
        $role = User::select('role')->where('id',$id_auth)->get();

        return view('dashboard/user-dashboard', ['role' => $role, 'sportclubs' => $sportclubs, 'kegiatans' => $kegiatans, 'anggotas' => $anggotas]);
    }
}
