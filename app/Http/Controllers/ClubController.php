<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sport_Club;
use App\Models\Anggota;
use App\Models\Inventaris;
use App\Models\Kegiatan;
use App\Models\User;
use App\Models\Presensi;
use Auth;

class ClubController extends Controller
{
    // routing ke page view list-club
    public function gotoListClub()
    {
        //mengambil semua data kegiatans
        $clubs = DB::table('sport__clubs')->where('deleted_at', null)->paginate(5);
        // Sport_Club::all()
        $users = User::all();
        $anggotas = Anggota::all();
        $inventariss = Inventaris::all();
        $kegiatans = Kegiatan::all();

        $id_auth= auth()->id();
        $role = User::find($id_auth);

        //mengirim semua data kegiatan kedalam view list club melalui variable clubs
        return view('club/list-club' ,array('clubs' => $clubs, 'anggotas'=>$anggotas, 'inventariss'=>$inventariss, 'kegiatans'=>$kegiatans, 'users'=>$users, 'role'=>$role));
    }

    public function search(Request $request)
	{
		// menangkap data pencarian
        $cari = $request->cari;
        $anggotas = Anggota::all();
        $inventariss = Inventaris::all();
        $kegiatans = Kegiatan::all();
 
    	// mengambil data dari table users sesuai pencarian data
        $clubs = DB::table('sport__clubs')->where('name','like',"%".$cari."%")->paginate();
        
        $id_auth= auth()->id();
        $role = User::find($id_auth);
 
    		// mengirim data users ke view index
		return view('club/list-club', ['clubs' => $clubs, 'anggotas'=>$anggotas, 'inventariss'=>$inventariss, 'kegiatans'=>$kegiatans, 'role'=>$role]);
 
	}

    // routing ke page view form-input-club
    public function gotoFormInputClub() {
        $users = User::all();
        $id_auth= auth()->id();
        $role = User::find($id_auth);
        return view('club/form-input-club', ['users' => $users, 'role' => $role]);
    }

    // route untuk method CREATE new anggota
    public function store(Request $request) {
    // Melakukan validasi pada form
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'pic' => 'required',
        ]);

        $sport_club = new Sport_Club;
        $sport_club->name = $request->name;
        $sport_club->pic = $request->pic;
        // $sport_club->budget = $request->budget;
        // $sport_club->admin_username = $request->admin_username;
        // $sport_club->admin_password = $request->admin_password;
        $sport_club->description = $request->description;
        $sport_club->role = 1;
        // $sport_club->lapangan = $request->lapangan;
        // $sport_club->meja = $request->meja;
        // $sport_club->net = $request->net;
        // $sport_club->raket = $request->raket;
        // $sport_club->bola = $request->bola;
        $sport_club->save();
        
        $id_pic = $request->pic;
        User::where('id', $id_pic)->update([
            'role' => 2
        ]);

        return redirect('club/list-club');
    }

    public function showCurrentClub($id) {
        $clubs = Sport_Club::find($id);
        $users = User::all();
        $id_auth= auth()->id();
        $role = User::find($id_auth);
        if(!$clubs) {
            abort(404);
        }
        return view('club/form-edit-club', ['clubs' => $clubs ,'users' => $users , 'role' => $role]);
    }

    // routing ke method update
    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'pic' => 'required',
        ]);
        
        $current_pic = $request->current_pic;
        if($current_pic == $request->pic) {
            // update mass assignment
            Sport_Club::where('id', $id)->update([
               'name' => $request->name,
               'pic' => $request->pic,
               'description' => $request->description,
            ]);
        } else {
            // update mass assignment
            User::where('id', $current_pic)->update([
               'role' => 3,
            ]);
            
            User::where('id', $request->pic)->update([
               'role' => 2,
            ]);
            
            // update mass assignment
            Sport_Club::where('id', $id)->update([
               'name' => $request->name,
               'pic' => $request->pic,
               'description' => $request->description,
            ]);
        }

        return redirect('/club/list-club');
    }

    public function nonaktif(Request $request, $id) {
        
        $current_pic = $request->current_pic;
        User::where('id', $current_pic)->update([
               'role' => 3,
        ]);

        Sport_Club::where('id', $id)->update([
          'role' => 2,
        ]);

        $anggotas = Anggota::where('id_sportclub',$id)->get();
        foreach ($anggotas as $anggota) {
            Anggota::where('id', $anggota->id)->update([
                'id_role' => 3,
             ]);
        }
        
        $kegiatans = Kegiatan::where('id_club',$id)->get();
        foreach ($kegiatans as $kegiatan) {
            Kegiatan::where('id', $kegiatan->id)->update([
                'role' => 2,
             ]);
        }

        return back()->with('alert','berhasil menonaktifkan sportclub');
    }

    public function aktif(Request $request, $id) {
        
        $current_pic = $request->current_pic;
        User::where('id', $current_pic)->update([
               'role' => 2,
        ]);

        Sport_Club::where('id', $id)->update([
           'role' => 1,
        ]);
        
        $kegiatans = Kegiatan::where('id_club',$id)->get();
        foreach ($kegiatans as $kegiatan) {
            Kegiatan::where('id', $kegiatan->id)->update([
                'role' => 1,
             ]);
        }

        return redirect('/club/list-club')->with('alert','berhasil menonaktifkan sportclub');
    }

     //delete kegiatan
     public function destroy($id) {
        // soft deletes
        $id_kegiatan = Kegiatan::where('id_club', $id)->pluck('id');
        if($id_kegiatan != null) {
            $presensi = Presensi::where('id_kegiatan', $id_kegiatan);
            $presensi->delete();
        }
        
        $kegiatans = Kegiatan::where('id_club', $id);
        if ($kegiatans != null) {
            $kegiatans->delete();   
        }
        
        $anggotas = Anggota::where('id_sportclub', $id);
        if ($anggotas != null) {
            $anggotas->delete();
        }
        
        $inventariss = Inventaris::where('id_club', $id);
        if ($inventariss != null) {
            $inventariss->delete();
        }
        
        $pic = Sport_Club::where('id', $id)->pluck('pic');
        User::where('id', $pic)->update([
            'role' => 3
        ]);
        
        $clubs = Sport_Club::find($id);
        $clubs->delete();
        
        return redirect('/club/list-club');
    }
}
