<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Kegiatan;
use App\Models\User;
use App\Models\Inventaris;
use App\Models\Sport_Club;
use App\Models\Anggota;

class SportController extends Controller
{
    // routing ke page view sport list
    public function gotoListSport() {
        
        $id= Auth::id();
        $role = User::find($id);

        $kegiatans = Kegiatan::all();
        $anggota = Anggota::all();
        
        
        
        $sportclub = Sport_Club::all();

        //code destroyer set (play with care)
        $anggota_id_array = Anggota::where('id_user',$id)->take(10)->get('id_sportclub')->pluck('id_sportclub');
        $anggota__not_approve_id_array = Anggota::where('id_user',$id)->where('id_role',1)->take(10)->get('id_sportclub')->pluck('id_sportclub');
        $anggota__approved_id_array = Anggota::where('id_user',$id)->where('id_role',2)->take(10)->get('id_sportclub')->pluck('id_sportclub');
        
        $sportclub_id_array = Sport_Club::whereIn('id',$anggota_id_array)->get()->pluck('name');
        $sportclub_exception_array = $sportclub->pluck('id','name')->except($sportclub_id_array);
        // dd($anggota__not_approve_id_array);
        $sportclub_except = Sport_Club::whereIn('id',$sportclub_exception_array)->where('role',1)->get();
        $sportclub_not_approve = Sport_Club::whereIn('id',$anggota__not_approve_id_array)->where('role',1)->get();
        $sportclub_approve = Sport_Club::whereIn('id',$anggota__approved_id_array)->where('role',1)->get();
        //end of set

        $inventariss = Inventaris::all();
        $users = User::all();

        return view('sport/list-sport', array('except'=>$sportclub_except,'approve'=>$sportclub_approve,'notapprove'=>$sportclub_not_approve,'anggotas'=>$anggota,'role'=>$role,'kegiatans'=>$kegiatans, 'sportclubs'=> $sportclub, 'inventariss'=> $inventariss, 'users'=> $users));
    }

    // routing untuk method ikut sport club
    public function storeNewMember(Request $request, $id) {
        $id_user= Auth::id();
        $anggota_count = Anggota::where('id_user',$id_user)->get()->count();
        if ($anggota_count<3) {
            $anggota_check = Anggota::where('id_user',$id_user)->where('id_sportclub',$id)->onlyTrashed()->count();
            if($anggota_check==0){
                $anggota = new Anggota;
                $anggota->id_user = $id_user;
                $anggota->id_sportclub = $id;
                $anggota->id_role = 1;
                $anggota->save();
            }else{
                $anggota_check = Anggota::where('id_user',$id_user)->where('id_sportclub',$id)->restore();
           
            }
            return redirect('sport/list-sport');
        }else{
            return redirect()->back()->with('alert','anda sudah mengikuti 3 sportclub');
        }
    }
        

    public function deleteMember(Request $request, $id) {

        // soft deletes
        $id_user= Auth::id();
        $anggota_count = Anggota::where('id_user',$id_user)->get()->count();

        if ($anggota_count>0) {
            $id_user= Auth::id();
            $anggota = Anggota::where('id_sportclub',$id)->where('id_user',$id_user)->get()->each;
            $anggota->delete();
            return redirect('sport/list-sport');
        }else{
            return redirect()->back()->with('alert','anda harus setidaknya join 1 sportclub untuk unjoin');
        }
       
    }
}
