<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;
use App\Models\Anggota;
use App\Models\Sport_Club;

class AnggotaController extends Controller
{
    // routing ke page view list-anggota
    public function gotoListAnggota()
    {
        // menampilkan data anggota
        $id_auth= auth()->id();
        $role = User::find($id_auth);
        $users = Anggota::join('users','users.id','=','anggotas.id_user')->paginate(5);
        $anggotas = Anggota::all();
        $sportclub = Sport_Club::all();

        return view('anggota/list-anggota', ['users' => $users,'anggotas' => $anggotas,'sportclubs' => $sportclub, 'anggotas' => $anggotas, 'role' => $role]);
    }

    // routing ke page view list-anggota
    public function gotoListAnggotaPic($id)
    {   
        // menampilkan data anggota
        $id_auth= auth()->id();
        $role = User::find($id_auth);
        $users = DB::table('users')->where('deleted_at', null)->orderBy('name', 'ASC')->paginate(5);
        $anggotas = Anggota::all();
        $sportclub = Sport_Club::find($id);
    
        return view('anggota/list-anggota-pic', ['users' => $users, 'anggotas' => $anggotas, 'role' => $role, 'sportclub' => $sportclub]);
    }
    
    public function gotoListAnggotaPicAll()
    {   
         $id_auth= auth()->id();
        $role = User::find($id_auth);
        $sportclubs = Sport_Club::where('pic',$role->id)->pluck('id');
        $users = Anggota::where('id_sportclub',$sportclubs)->pluck('id_user');
        $users_not = Anggota::where('id_sportclub',$sportclubs)->where('id_role','1')->pluck('id_user');
        $sportclubs_count = User::whereIn('id',$users)->orderBy('name', 'ASC')->count();
        
        $aktif_anggota = Anggota::where('id_sportclub',$sportclubs)->where('id_role', '2')->count();
        $nonaktif_anggota = Anggota::where('id_sportclub',$sportclubs)->where('id_role', '3')->count();
        $pending_anggota = Anggota::where('id_sportclub',$sportclubs)->where('id_role', '1')->count();

        $not=array();
        foreach ($users_not as $join) {
            $not[]=$join;
        }
        
        $user = Anggota::where('id_sportclub',$sportclubs)->join('users','users.id','=','anggotas.id_user')->paginate(10);
        // menampilkan data anggota
        $sportclub = Sport_Club::find($sportclubs);
        $sportclubs_data= array();
        foreach ($sportclub as $sportclub_data) {
            $sportclubs_data = $sportclub_data;
        }
        $anggotas = Anggota::all();

        return view('anggota/list-anggota-pic', ['aktif_anggota'=>$aktif_anggota, 'nonaktif_anggota'=>$nonaktif_anggota, 'pending_anggota'=>$pending_anggota, 'notapprove'=>$not,'users' => $user, 'anggotas' => $anggotas, 'role' => $role, 'sportclub' => $sportclubs_data,'sportclub_count' => $sportclubs_count]);
    }

    // routing ke page view form-input-anggota
    public function gotoFormInputAnggota()
    {
        $id_auth= auth()->id();
        $role = User::find($id_auth);
        return view('anggota/form-input-anggota', ['role' => $role]);
    }

    public function search(Request $request)
	{
		// menangkap data pencarian
        $cari = $request->cari;
        $anggotas = Anggota::all();
 
    	// mengambil data dari table users sesuai pencarian data
        $users = DB::table('users')->where('name','like',"%".$cari."%")->paginate();
        
        $id_auth= auth()->id();
        $role = User::find($id_auth);
 
    		// mengirim data users ke view index
		return view('anggota/list-anggota', ['users' => $users, 'anggotas' => $anggotas, 'role' => $role]);
 
    }
    
    public function searchPic(Request $request, $id)
	{
		// menangkap data pencarian
        $cari = $request->cari;
        $anggotas = Anggota::all();
        $sportclub = Sport_Club::find($id);
 
    	// mengambil data dari table users sesuai pencarian data
        $users = DB::table('users')->where('name','like',"%".$cari."%")->paginate();
        
        $id_auth= auth()->id();
        $role = User::find($id_auth);
 
    		// mengirim data users ke view index
		return view('anggota/list-anggota-pic', ['users' => $users, 'anggotas' => $anggotas, 'role' => $role, 'sportclub' => $sportclub]);
 
	}

    // route untuk method CREATE new anggota
    public function store(Request $request) {
        // Melakukan validasi pada form
        $this->validate($request, [
			'name' => 'required',
            'username' => 'required',
            'nik' => 'required|numeric',
            'email' => 'required',
            'password' => 'required',
            'address' => 'required',
            'personal_contact' => 'required|numeric',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->nik = $request->nik;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->address = $request->address;
        $user->personal_contact = $request->personal_contact;
        $user->place_of_birth = $request->place_of_birth;
        $user->date_of_birth = $request->date_of_birth;
        $user->save();
        return redirect('/anggota/list-anggota');
    }

    // route untuk method delete  anggota pada halaman super admin
    public function destroySuper(Request $request, $id) {        
        // soft deletes
        // $user = anggota::find($id);
        $id_sportclub = $request->scId;
        $sportclub = Sport_Club::where('id',$id_sportclub)->pluck('id');
        $sportclubs_data= 0;
        foreach ($sportclub as $sportclub_data) {
            $sportclubs_data = $sportclub_data;
        }
        $user = anggota::where('id_user', $id)->where('id_sportclub',$sportclubs_data);
        anggota::where('id_user', $id)->where('id_sportclub',$sportclubs_data)->update([
            'id_role' => 1
        ]);
        $user->delete();
        return redirect()->back()->with('alert','berhasil mengapus anggota');
    }

    // route untuk method delete anggota pada halaman admin
    public function nonaktifAdmin($id) {        
        // soft deletes
        $id_auth= auth()->id();
        $sportclub = Sport_Club::where('pic',$id_auth)->pluck('id');
        $sportclubs_data= 0;
        foreach ($sportclub as $sportclub_data) {
            $sportclubs_data = $sportclub_data;
        }
        // $user = anggota::where('id_user', $id)->where('id_sportclub',$sportclubs_data);
        // anggota::where('id_user', $id)->where('id_sportclub',$sportclubs_data)->update([
        //     'id_role' => 1
        // ]);
        anggota::where('id_user', $id)->where('id_sportclub',$sportclubs_data)->update([
            'id_role' => 3
        ]);
        // $user->delete();
        return redirect()->back()->with('alert','berhasil menonaktifkan anggota');
    }
    public function aktifAdmin($id) {        
        // soft deletes
        $id_auth= auth()->id();
        $sportclub = Sport_Club::where('pic',$id_auth)->pluck('id');
        $sportclubs_data= 0;
        foreach ($sportclub as $sportclub_data) {
            $sportclubs_data = $sportclub_data;
        }
        // $user = anggota::where('id_user', $id)->where('id_sportclub',$sportclubs_data);
        // anggota::where('id_user', $id)->where('id_sportclub',$sportclubs_data)->update([
        //     'id_role' => 1
        // ]);
        anggota::where('id_user', $id)->where('id_sportclub',$sportclubs_data)->update([
            'id_role' => 2
        ]);
        // $user->delete();
        return redirect()->back()->with('alert','berhasil mengaktifkan anggota');
    }
    
    public function nonaktifSuper($sport,$id) {        
        // soft deletes
        $id_auth= auth()->id();
        // $user = anggota::where('id_user', $id)->where('id_sportclub',$sportclubs_data);
        // anggota::where('id_user', $id)->where('id_sportclub',$sportclubs_data)->update([
        //     'id_role' => 1
        // ]);
        anggota::where('id_user', $id)->where('id_sportclub',$sport)->update([
            'id_role' => 3
        ]);
        // $user->delete();
        return redirect()->back()->with('alert','berhasil menonaktifkan anggota');
    }
    public function aktifSuper($sport,$id) {        
        // soft deletes
        $id_auth= auth()->id();
        // $user = anggota::where('id_user', $id)->where('id_sportclub',$sportclubs_data);
        // anggota::where('id_user', $id)->where('id_sportclub',$sportclubs_data)->update([
        //     'id_role' => 1
        // ]);
        anggota::where('id_user', $id)->where('id_sportclub',$sport)->update([
            'id_role' => 2
        ]);
        // $user->delete();
        return redirect()->back()->with('alert','berhasil mengaktifkan anggota');
    }

    // routing ke view detail anggota
    public function showDetailAnggota($id) { 
        $users = User::find($id);
        $id_auth= auth()->id();
        $role = User::find($id_auth);
        if(!$users) {
            abort(404);
        }
        return view('anggota/data-detail-anggota', ['users' => $users, 'role' => $role]);
    }

     // routing ke view detail anggota
     public function showDetailAnggotaPic($id) { 
        $user = User::find($id);
        $id_auth= auth()->id();
        $role = User::find($id_auth);

        if(!$user) {
            abort(404);
        }

        return view('anggota/data-detail-anggota-pic', ['users' => $user, 'role' => $role]);
    }


    // routing ke view selected anggota
    public function showCurrentAnggota($id) {
        $users = User::find($id);
        $id_auth= auth()->id();
        $role = User::find($id_auth);
        if(!$users) {
            abort(404);
        }
        return view('anggota/form-edit-anggota', ['users' => $users, 'role' => $role]);
    }

    public function approveAnggotaSuper(Request $request, $id) {
        // $id_sportclub = Anggota::where('id_user',$id)->pluck('id_sportclub');
        // $pic = Sport_Club::where('id', $id_sportclub)->pluck('pic');
        
        $id_sportclub = $request->scId;
        $sportclub = Sport_Club::where('id',$id_sportclub)->pluck('id');
        $sportclubs_data= 0;
        foreach ($sportclub as $sportclub_data) {
            $sportclubs_data = $sportclub_data;
        }
        anggota::where('id_user', $id)->where('id_sportclub',$sportclubs_data)->update([
            'id_role' => 2
        ]);
         return redirect()->back()->with('alert','permintaan bergabung sudah di terima');
    }
    
    public function approveAnggota($id) {
        $id_auth= auth()->id();
        $sportclub = Sport_Club::where('pic',$id_auth)->pluck('id');
        $sportclubs_data= 0;
        foreach ($sportclub as $sportclub_data) {
            $sportclubs_data = $sportclub_data;
        }
        anggota::where('id_user', $id)->where('id_sportclub',$sportclubs_data)->update([
            'id_role' => 2
         ]);
         return redirect()->back()->with('alert','permintaan bergabung sudah di terima');
    }

    // routing ke method update
    public function update(Request $request, $id) {
        // // update biasa
        // $users = User::find($id);
        // $user->name = $request->name;
        // $user->username = $request->username;
        // $user->nik = $request->nik;
        // $user->email = $request->email;
        // $user->password = $request->password;
        // $user->address = $request->address;
        // $user->personal_contact = $request->personal_contact;
        // $user->place_of_birth = $request->place_of_birth;
        // $user->date_of_birth = $request->date_of_birth;
        // $user->save();
        
        // Melakukan validasi pada form
        $this->validate($request, [
			'name' => 'required',
            'unit' => 'required',
            'nip' => 'required|numeric',
            'email' => 'required',
            // 'password' => 'required',
            'address' => 'required',
            'personal_contact' => 'required|numeric',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
        ]);

        // update mass assignment
        User::where('id', $id)->update([
           'name' => $request->name,
           'unit' => $request->unit,
           'nip' => $request->nip,
           'email' => $request->email,
        //    'password' => $request->password,
           'address' =>  $request->address,
           'personal_contact' => $request->personal_contact,
           'place_of_birth' =>  $request->place_of_birth,
           'date_of_birth' => $request->date_of_birth,
        ]);

        return redirect('/anggota/list-anggota');
    }
}
