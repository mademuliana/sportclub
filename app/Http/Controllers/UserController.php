<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kegiatan;
use App\Models\Anggota;
use App\Models\User;
use App\Models\Presensi;
use App\Models\Sport_Club;
use Auth;
use Carbon\Carbon;

class UserController extends Controller
{
    // routing ke page view user
    public function gotoUser() {
        $kegiatans =  DB::table('kegiatans')->where('deleted_at', null)->orderBy('id', 'desc')->paginate(20);
        $presensis = Presensi::all();
        $anggotas = Anggota::all();
        $users = User::all();
        $sportclubs = Sport_Club::all();

        $id_auth= auth()->id();
        $role = User::find($id_auth);

        return view('user/user', ['role'=>$role, 'sportclubs' => $sportclubs, 'kegiatans' => $kegiatans, 'anggotas' => $anggotas, 'users' => $users, 'presensis' => $presensis]);
    }

    public function search(Request $request)
	{
		// menangkap data pencarian
        $cari = $request->cari;
        $presensis = Presensi::all();
        $anggotas = Anggota::all();
        $users = User::all();
        $sportclubs = Sport_Club::all();

    	// mengambil data dari table users sesuai pencarian data
        $kegiatans = DB::table('kegiatans')->where('name','like',"%".$cari."%")->paginate();
        
        $id_auth= auth()->id();
        $role = User::find($id_auth);
 
        // mengirim data users ke view index
		return view('user/user', ['role'=>$role, 'sportclubs' => $sportclubs, 'kegiatans' => $kegiatans, 'anggotas' => $anggotas, 'users' => $users, 'presensis' => $presensis]);
 
	}
}
