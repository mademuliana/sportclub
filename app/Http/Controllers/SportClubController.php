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

class SportClubController extends Controller
{
    // routing ke page view sport-club
    public function gotoSportClub($id) {
        
        $pic = Sport_Club::where('id', $id)->pluck('pic');
        $pic_name = User::where('id', $pic)->pluck('name');
        
        $kegiatans = DB::table('kegiatans')->where('deleted_at', null)->orderBy('id', 'DESC')->paginate(10);
        $presensi = Presensi::all();
        $anggotas = Anggota::all();
        $users = DB::table('users')->where('deleted_at', null)->orderBy('name', 'DESC')->paginate(10);
        $inventariss = DB::table('inventaris')->where('deleted_at', null)->orderBy('name', 'asc')->paginate(10);
        $sportclubs = Sport_Club::find($id);

        $id_auth= auth()->id();
        $role = User::find($id_auth);

        return view('sport-club/sport-club', ['role'=>$role, 'sportclubs' => $sportclubs, 'kegiatans' => $kegiatans, 'anggotas' => $anggotas, 'users' => $users, 'pic_name' => $pic_name, 'inventariss' => $inventariss]);
    }

    public function searchKegiatan(Request $request, $id){
		  // menangkap data pencarian
        $cari = $request->cari;
        $presensi = Presensi::all();
        $anggotas = Anggota::all();
        $users = DB::table('users')->orderBy('name', 'DESC')->paginate(10);
        $sportclubs = Sport_Club::find($id);
        $inventariss = DB::table('inventaris')->orderBy('name', 'DESC')->paginate(10);

    	// mengambil data dari table users sesuai pencarian data
      $kegiatans = DB::table('kegiatans')->where('name','like',"%".$cari."%")->paginate();
      
      
      $id_auth= auth()->id();
      $role = User::find($id_auth);
 
      // mengirim data users ke view index
	  	return view('sport-club/sport-club', ['role'=>$role, 'sportclubs' => $sportclubs, 'kegiatans' => $kegiatans, 'anggotas' => $anggotas, 'users' => $users, 'inventariss' => $inventariss]);
    }
    
    public function searchAnggota(Request $request, $id){
		// menangkap data pencarian
        $cari = $request->cari;
        $presensi = Presensi::all();
        $anggotas = Anggota::all();
        $kegiatans = DB::table('kegiatans')->orderBy('id', 'DESC')->paginate(10);
        $sportclubs = Sport_Club::find($id);
        $inventariss = DB::table('inventaris')->orderBy('name', 'DESC')->paginate(10);

    	// mengambil data dari table users sesuai pencarian data
		  $users = DB::table('users')->where('name','like',"%".$cari."%")->paginate();
 
      $id_auth= auth()->id();
      $role = User::find($id_auth);

    		// mengirim data users ke view index
		  return view('sport-club/sport-club', ['role'=>$role, 'sportclubs' => $sportclubs, 'kegiatans' => $kegiatans, 'anggotas' => $anggotas, 'users' => $users, 'inventariss' => $inventariss]);
    }

    public function searchInventaris(Request $request, $id){
		// menangkap data pencarian
        $cari = $request->cari;
        $presensi = Presensi::all();
        $anggotas = Anggota::all();
        $users = DB::table('users')->orderBy('name', 'DESC')->paginate(10);        $sportclubs = Sport_Club::find($id);
        $kegiatans = DB::table('kegiatans')->orderBy('id', 'DESC')->paginate(10);

    	// mengambil data dari table users sesuai pencarian data
		  $inventariss = DB::table('inventaris')->where('name','like',"%".$cari."%")->paginate();
 
    
      $id_auth= auth()->id();
      $role = User::find($id_auth);

    	// mengirim data users ke view index
		  return view('sport-club/sport-club', ['role'=>$role, 'sportclubs' => $sportclubs, 'kegiatans' => $kegiatans, 'anggotas' => $anggotas, 'users' => $users, 'inventariss' => $inventariss]);
    }

}
