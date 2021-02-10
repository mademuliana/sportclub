<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Kegiatan;
use App\Models\User;
use App\Models\Presensi;
use App\Models\Sport_Club;
use App\Models\Anggota;
use Auth;
use Carbon\Carbon;

class KegiatanController extends Controller
{
     public function gotoListInventarisPicAll()
    {
        $id_auth= auth()->id();
        $role = User::find($id_auth);
        $id_sport = array();
        $sportclub_id = Sport_Club::where('pic',$id_auth)->pluck('id');
        foreach ($sportclub_id as $id) {
            $id_sport = $id;
        }
        //mengambil semua data inventaris
        $inventariss = DB::table('inventaris')->where('deleted_at', null)->orderBy('id', 'DESC')->paginate(10);
        $sportclubs = Sport_Club::find($id_sport);


        //mengirim semua data inventaris kedalam view list inventaris melalui variable inventaris
        return view('inventaris/list-inventaris-pic', ['inventariss'=>$inventariss, 'sportclubs'=>$sportclubs, 'role'=>$role]);
    }
    
    // routing ke page view list-kegiatan
    public function gotoListKegiatan()
    {
        //mengambil semua data kegiatan
        $kegiatans = DB::table('kegiatans')->where('deleted_at', null)->orderBy('id', 'DESC')->paginate(10);
        $presensi = Presensi::all();
        $sportclubs = Sport_Club::all();

        $id_auth= auth()->id();
        $role = User::find($id_auth);

        //mengirim semua data kegiatan kedalam view list kegiatan melalui variable kegiatans
        return view('kegiatan/list-kegiatan', array('kegiatans'=>$kegiatans,'presensis'=>$presensi, 'sportclubs'=> $sportclubs, 'role'=> $role));
    }

    // routing ke page view list-kegiatan-pic
    public function gotoListKegiatanPic($id)
    {
       
        //mengambil semua data kegiatan
        $kegiatans = DB::table('kegiatans')->where('deleted_at', null)->orderBy('id', 'DESC')->paginate(10);
        $presensi = Presensi::all();
        $sportclub = Sport_Club::find($id);

        $id_auth= auth()->id();
        $role = User::findOrFail($id_auth);

        //mengirim semua data kegiatan kedalam view list kegiatan melalui variable kegiatans
        return view('kegiatan/list-kegiatan-pic', array('kegiatans'=>$kegiatans,'presensis'=>$presensi, 'sportclub'=> $sportclub, 'role'=> $role));
    }

   public function gotoListKegiatanPicAll()
    {
        //mengambil semua data kegiatan
        $id_auth= auth()->id();
        $role = User::findOrFail($id_auth);
        $sportclub_id = Sport_club::where('pic',$id_auth)->pluck('id');
        $id_sport = array();

        foreach ($sportclub_id as $id) {
            $id_sport = $id;
        }
        
        $kegiatans = DB::table('kegiatans')->where('deleted_at', null)->orderBy('id', 'DESC')->paginate(10);
        $presensi = Presensi::all();
        $sportclub = Sport_Club::find($id_sport);
        


        //mengirim semua data kegiatan kedalam view list kegiatan melalui variable kegiatans
        return view('kegiatan/list-kegiatan-pic', array('kegiatans'=>$kegiatans,'presensis'=>$presensi, 'sportclub'=> $sportclub, 'role'=> $role));
    }

    // routing ke page view list-kegiatan-member
    public function gotoListKegiatanMember()
    {   
         
        $presensis = Presensi::all();
        $anggotas = Anggota::all();
        $users = User::all();
        $sportclubs = Sport_Club::all();

        $id= Auth::id();
        $role = User::find($id);
        $now = Carbon::now();
        

        $anggota_id_array = Anggota::where('id_user',$id)->get()->pluck('id');
        $anggota_sport_array = Anggota::where('id_user',$id)->get()->pluck('id_sportclub');
        $kegiatan_id = Presensi::whereIn('id_anggota',$anggota_id_array)->where('type','1')->pluck('id_kegiatan');
        $kegiatan_join = array();
        foreach ($kegiatan_id as $join) {
            $kegiatan_join[]=$join;
        }
        $kegiatan_id_array = Kegiatan::whereIn('id',$kegiatan_id)->get()->pluck('id');

        $kegiatans = Kegiatan::WhereIn('id_club',$anggota_sport_array)->where('is_approved','1')->where('deleted_at',null)->where('date','>',$now)->orderBy('id', 'DESC')->paginate(10);
        $kegiatans_count = Kegiatan::WhereIn('id_club',$anggota_sport_array)->where('is_approved','1')->where('deleted_at',null)->where('date','>',$now)->count();
        
        $kegiatan_exception_array = $kegiatans->pluck('id','name')->except($kegiatan_id_array);
        $kegiatan_except = Kegiatan::whereIn('id',$kegiatan_exception_array)->get();
        $kegiatan_include = Kegiatan::whereIn('id',$kegiatan_id)->get();
        
        $anggota__approved_id_array = Anggota::where('id_user',$id)->where('id_role',2)->take(10)->get('id_sportclub')->pluck('id_sportclub');
        $sportclub_approve = Sport_Club::whereIn('id',$anggota__approved_id_array)->get();

        //mengirim semua data kegiatan kedalam view list kegiatan melalui variable kegiatans
        return view('kegiatan/list-kegiatan-member', array('approve'=>$sportclub_approve, 'now'=>$now,'kegiatans_include'=>$kegiatan_join,'kegiatans'=>$kegiatans,'presensis'=>$presensis, 'sportclubs'=> $sportclubs, 'anggotas'=> $anggotas, 'role'=> $role));
    }

    // routing ke page view list-kegiatan-member
    public function gotoListKeikutsertaan()
    {
        
        $anggotas = Anggota::all();
        $users = User::all();
        $sportclubs = Sport_Club::all();

        $id= Auth::id();
        $role = User::find($id);
        $now = Carbon::now();
        
        $anggota_id_array = Anggota::where('id_user',$id)->get()->pluck('id');
        $anggota_sport_array = Anggota::where('id_user',$id)->get()->pluck('id_sportclub');
        $kegiatan_id = Presensi::whereIn('id_anggota',$anggota_id_array)->where('type','1')->pluck('id_kegiatan');
        $keaktifan_count = Presensi::whereIn('id_anggota',$anggota_id_array)->where('type','2')->count();
        $presensi = Presensi::whereIn('id_anggota',$anggota_id_array)->get();
        $kegiatan_join = array();
        foreach ($kegiatan_id as $join) {
            $kegiatan_join[]=$join;
        }
        $kegiatan_id_array = Kegiatan::whereIn('id',$kegiatan_id)->get()->pluck('id');

        $kegiatans = Kegiatan::WhereIn('id_club',$anggota_sport_array)->where('is_approved','1')->where('deleted_at',null)->where('date','>',$now)->orderBy('id', 'DESC')->paginate(10);
        $kegiatans_count = Kegiatan::WhereIn('id_club',$anggota_sport_array)->where('is_approved','1')->where('deleted_at',null)->where('date','>',$now)->count();

        $kegiatan_exception_array = $kegiatans->pluck('id','name')->except($kegiatan_id_array);
        $kegiatan_except = Kegiatan::whereIn('id',$kegiatan_exception_array)->get();
        $kegiatan_include = Kegiatan::whereIn('id',$kegiatan_id)->paginate(10);
       

        return view('kegiatan/keikutsertaan', ['keaktifan_count'=>$keaktifan_count,'now'=>$now,'kegiatans_count' => $kegiatans_count,'kegiatans_include' => $kegiatan_join, 'role'=>$role,'sportclubs' => $sportclubs, 'kegiatans' => $kegiatan_include, 'anggotas' => $anggotas, 'users'=>$users,'presensis'=>$presensi]);

    }

    // routing ke page view list-kegiatan-approve
    public function gotoListKegiatanApprove()
    {
        //mengambil semua data kegiatan
        $kegiatans = Kegiatan::where('type', 1)->where('deleted_at', null)->orderBy('id', 'DESC')->paginate(5);
        $presensi = Presensi::all();
        $sportclubs = Sport_Club::all();

        $id_auth= auth()->id();
        $role = User::find($id_auth);

        //mengirim semua data kegiatan kedalam view list kegiatan melalui variable kegiatans
        return view('kegiatan/list-kegiatan-approve', array('kegiatans'=>$kegiatans,'presensis'=>$presensi, 'role'=> $role , 'sportclubs'=> $sportclubs));
    }

    public function showDetailKegiatan($id) {
        $kegiatans = Kegiatan::find($id);
        $sportclubs = Sport_Club::all();
        if(!$kegiatans) {
            abort(404);
        }

        $id_auth= auth()->id();
        $role = User::find($id_auth);

        return view('kegiatan/detail-kegiatan', ['kegiatans' => $kegiatans, 'sportclubs'=> $sportclubs, 'role'=> $role]);
    }

    public function showDetailKegiatanPic($id) {
        $kegiatans = Kegiatan::find($id);
        $sportclubs = Sport_Club::all();
        if(!$kegiatans) {
            abort(404);
        }

        $id_auth= auth()->id();
        $role = User::find($id_auth);

        return view('kegiatan/detail-kegiatan-pic', ['kegiatans' => $kegiatans, 'sportclubs'=> $sportclubs, 'role'=> $role]);
    }

    public function showDetailKegiatanMember($id) {
        $kegiatans = Kegiatan::find($id);
        $sportclubs = Sport_Club::all();
        if(!$kegiatans) {
            abort(404);
        }

        $id_auth= auth()->id();
        $role = User::find($id_auth);

        return view('kegiatan/detail-kegiatan-member', ['kegiatans' => $kegiatans, 'sportclubs'=> $sportclubs, 'role'=> $role]);
    }

    public function search(Request $request)
	{
		// menangkap data pencarian
        $cari = $request->cari;
        $presensi = Presensi::all();
        $sportclubs = Sport_Club::all();
 
    	// mengambil data dari table users sesuai pencarian data
        $kegiatans = DB::table('kegiatans')->where('name','like',"%".$cari."%")->paginate();
        
        $id_auth= auth()->id();
        $role = User::find($id_auth);
 
    		// mengirim data users ke view index
		return view('kegiatan/list-kegiatan', ['kegiatans'=>$kegiatans,'presensis'=>$presensi, 'sportclubs'=> $sportclubs, 'role'=> $role]);
    }

    public function searchPic(Request $request, $id)
	{
		// menangkap data pencarian
        $cari = $request->cari;
        $presensi = Presensi::all();
        $sportclub = Sport_Club::find($id);
 
    	// mengambil data dari table users sesuai pencarian data
        $kegiatans = DB::table('kegiatans')->where('name','like',"%".$cari."%")->paginate();
        
        $id_auth= auth()->id();
        $role = User::find($id_auth);
 
    		// mengirim data users ke view index
		return view('kegiatan/list-kegiatan-pic', ['kegiatans'=>$kegiatans,'presensis'=>$presensi, 'sportclub'=> $sportclub, 'role'=> $role]);
 
    }
    
    public function searchMember(Request $request)
	{
		// menangkap data pencarian
        $cari = $request->cari;
        $presensi = Presensi::all();
        $sportclubs = Sport_Club::all();
        $anggotas = Anggota::all();

    	// mengambil data dari table users sesuai pencarian data
        $kegiatans = DB::table('kegiatans')->where('name','like',"%".$cari."%")->paginate();
        
        $id_auth= auth()->id();
        $role = User::find($id_auth);
 
        // mengirim data users ke view index
		return view('kegiatan/list-kegiatan-member', ['kegiatans'=>$kegiatans, 'anggotas'=>$anggotas, 'presensis'=>$presensi, 'sportclubs'=> $sportclubs, 'role'=> $role]);
    }

    public function searchApproved(Request $request)
	{
		// menangkap data pencarian
        $cari = $request->cari;
        $presensi = Presensi::all();
 
    	// mengambil data dari table users sesuai pencarian data
        $kegiatans = DB::table('kegiatans')->where('name','like',"%".$cari."%")->paginate();
    
        
        $id_auth= auth()->id();
        $role = User::find($id_auth);
 
    		// mengirim data users ke view index
		return view('kegiatan/list-kegiatan-approve', ['kegiatans'=>$kegiatans,'presensis'=>$presensi, 'role'=> $role]);
 
	}

    //delete kegiatan
    public function destroy($id) {

        // soft deletes
        $kegiatan = Kegiatan::find($id);
        $kegiatan->delete();
        return redirect('/kegiatan/list-kegiatan');
    }

    //delete kegiatan
    public function destroyPic($id) {

        // soft deletes
        $kegiatan = Kegiatan::find($id);
        $kegiatan->delete();
        return redirect('/dashboard/pic');
    }

    // routing ke page view form-input-kegiatan
    public function gotoFormInputKegiatan()
    {
        $sportclubs = Sport_Club::all();

        $id_auth= auth()->id();
        $role = User::find($id_auth);

        return view('kegiatan/form-input-kegiatan', ['sportclubs'=>$sportclubs, 'role'=>$role]);
    }
    
    // routing ke page view form-input-kegiatan
    public function gotoFormInputKegiatanPic($id)
    {
        $sportclubs = Sport_Club::find($id);

        $id_auth= auth()->id();
        $role = User::find($id_auth);

        return view('kegiatan/form-input-kegiatan-pic', ['sportclubs'=>$sportclubs, 'role'=>$role]);
    }

     // route untuk method CREATE new kegiatan
     public function storeIncidental(Request $request) {
        $this->validate($request, [
			'name' => 'required',
            'id_club' => 'required',
            'start_time' => 'required',
            'finish_time' => 'required|after:start_time',
            'date' => 'required|after:today',
            'place' => 'required',
            // 'type' => 'required',
            'budget' => 'required|numeric',
            'information' => 'required',
            'proposal' => 'required|mimes:pdf',
            'poster' => 'required|mimes:jpeg,png,jpg',
        ]);
        
        $kegiatan = new Kegiatan;
   
        $poster = $request->file('poster');
        $proposal = $request->file('proposal');
        $proposal_name= rand(1, 9999)."insiden".str_replace(' ', '_', $proposal->getClientOriginalName());
        $poster_name= rand(1, 9999)."insiden".str_replace(' ', '_', $poster->getClientOriginalName());
        $tujuan_upload_poster = 'poster';
        $tujuan_upload_proposal = 'proposal';
        // file validation
        // $validator      =   Validator::make($request->all(),
        // ['proposal'      =>   'required|mimes:doc, pdf'],
        // ['poster'      =>   'required|mimes:jpeg,png,jpg,bmp']);
        $poster->move($tujuan_upload_poster,$poster_name);
        $proposal->move($tujuan_upload_proposal,$proposal_name);

        $kegiatan->name = $request->name;
        $kegiatan->id_club = $request->id_club;
        $kegiatan->start_time = $request->start_time;
        $kegiatan->finish_time = $request->finish_time;
        $kegiatan->date = $request->date;
        $kegiatan->place = $request->place;
        $kegiatan->activity_status = 1;
        $kegiatan->type = 1;
        $kegiatan->budget = $request->budget;
        $kegiatan->information = $request->information;
        $kegiatan->is_approved = 0;
        $kegiatan->budget_approved = 0;
        $kegiatan->proposal = $proposal_name;
        $kegiatan->poster = $poster_name;
        $kegiatan->role = 1;
        $kegiatan->save();
        return redirect('/kegiatan/list-kegiatan');
    }

    // route untuk method CREATE new kegiatan
    public function storeIncidentalPic(Request $request) {
        $this->validate($request, [
			'name' => 'required',
            'id_club' => 'required',
            'start_time' => 'required',
            'finish_time' => 'required|after:start_time',
            'date' => 'required|after:today',
            'place' => 'required',
            // 'type' => 'required',
            'budget' => 'required|numeric',
            'information' => 'required',
            'proposal' => 'required|mimes:pdf',
            'poster' => 'required|mimes:jpeg,png,jpg',
        ]);
        
        $kegiatan = new Kegiatan;
   
        $poster = $request->file('poster');
        $proposal = $request->file('proposal');
        $proposal_name= rand(1, 9999)."insiden".str_replace(' ', '_', $proposal->getClientOriginalName());
        $poster_name= rand(1, 9999)."insiden".str_replace(' ', '_', $poster->getClientOriginalName());
        $tujuan_upload_poster = 'poster';
        $tujuan_upload_proposal = 'proposal';
        // file validation
        // $validator      =   Validator::make($request->all(),
        // ['proposal'      =>   'required|mimes:doc, pdf'],
        // ['poster'      =>   'required|mimes:jpeg,png,jpg,bmp']);
        $poster->move($tujuan_upload_poster,$poster_name);
        $proposal->move($tujuan_upload_proposal,$proposal_name);

        $kegiatan->name = $request->name;
        $kegiatan->id_club = $request->id_club;
        $kegiatan->start_time = $request->start_time;
        $kegiatan->finish_time = $request->finish_time;
        $kegiatan->date = $request->date;
        $kegiatan->place = $request->place;
        $kegiatan->activity_status = 1;
        $kegiatan->type = 1;
        $kegiatan->budget = $request->budget;
        $kegiatan->information = $request->information;
        $kegiatan->is_approved = 0;
        $kegiatan->budget_approved = 0;
        $kegiatan->proposal = $proposal_name;
        $kegiatan->poster = $poster_name;
        $kegiatan->role = 1;
        $kegiatan->save();
        return redirect('/dashboard/pic');
    }
    
    
    public function storeRutin(Request $request) {
        
        $this->validate($request, [
            'name' => 'required',
            'id_club' => 'required',
            'poster' => 'required|mimes:jpeg,png,jpg',
            'start_time' => 'required',
            'finish_time' => 'required|after:start_time',
            'date' => 'required|after:today',
        ]);
        
        $kegiatan = new Kegiatan;
   
        $poster = $request->file('poster');
        $poster_name= rand(1, 9999)."rutin".str_replace(' ', '_', $poster->getClientOriginalName());
        $tujuan_upload_poster = 'poster';
        // file validation
        // $validator      =   Validator::make($request->all(),
        // ['proposal'      =>   'required|mimes:doc, pdf'],
        // ['poster'      =>   'required|mimes:jpeg,png,jpg,bmp']);
        $poster->move($tujuan_upload_poster,$poster_name);

        $kegiatan->name = $request->name;
        $kegiatan->id_club = $request->id_club;
        $kegiatan->start_time = $request->start_time;
        $kegiatan->finish_time = $request->finish_time;
        $kegiatan->date = $request->date;
        $kegiatan->place = $request->place;
        $kegiatan->activity_status = 1;
        $kegiatan->type = 2;
        $kegiatan->budget = 0;
        $kegiatan->information = null;
        $kegiatan->is_approved = 1;
        $kegiatan->budget_approved = 0;
        $kegiatan->proposal = null;
        $kegiatan->poster = $poster_name;
        $kegiatan->role = 1;
        $kegiatan->save();
        return redirect('/kegiatan/list-kegiatan');
    }

    public function storeRutinPic(Request $request) {
        
        $this->validate($request, [
            'name' => 'required',
            'id_club' => 'required',
            'poster' => 'required|mimes:jpeg,png,jpg',
            'start_time' => 'required',
            'finish_time' => 'required|after:start_time',
            'date' => 'required|after:today',
        ]);
        
        $kegiatan = new Kegiatan;
   
        $poster = $request->file('poster');
        $poster_name= rand(1, 9999)."rutin".str_replace(' ', '_', $poster->getClientOriginalName());
        $tujuan_upload_poster = 'poster';
        // file validation
        // $validator      =   Validator::make($request->all(),
        // ['proposal'      =>   'required|mimes:doc, pdf'],
        // ['poster'      =>   'required|mimes:jpeg,png,jpg,bmp']);
        $poster->move($tujuan_upload_poster,$poster_name);

        $kegiatan->name = $request->name;
        $kegiatan->id_club = $request->id_club;
        $kegiatan->start_time = $request->start_time;
        $kegiatan->finish_time = $request->finish_time;
        $kegiatan->date = $request->date;
        $kegiatan->place = $request->place;
        $kegiatan->activity_status = 1;
        $kegiatan->type = 2;
        $kegiatan->budget = 0;
        $kegiatan->information = null;
        $kegiatan->is_approved = 1;
        $kegiatan->budget_approved = 0;
        $kegiatan->proposal = null;
        $kegiatan->poster = $poster_name;
        $kegiatan->role = 1;
        $kegiatan->save();
        return redirect('/dashboard/pic');
    }

    public function showCurrentKegiatanIncedental($id) {
        $kegiatans = Kegiatan::find($id);
        $sportclubs = Sport_Club::all();
        $id_auth= auth()->id();
        $role = User::find($id_auth);

        if(!$kegiatans) {
            abort(404);
        }
        return view('kegiatan/form-edit-kegiatan', ['kegiatans' => $kegiatans, 'sportclubs'=> $sportclubs, 'role'=> $role]);
    }

    public function showCurrentKegiatanRutin($id) {
        $kegiatans = Kegiatan::find($id);
        $sportclubs = Sport_Club::all();
        if(!$kegiatans) {
            abort(404);
        }

        $id_auth= auth()->id();
        $role = User::find($id_auth);

        return view('kegiatan/form-edit-kegiatan-rutin', ['kegiatans' => $kegiatans, 'sportclubs'=> $sportclubs, 'role'=> $role]);
    }

    public function showCurrentKegiatanIncedentalPic($sportid, $id) {
        $kegiatans = Kegiatan::find($id);
        $sportclubs = Sport_Club::findOrFail($sportid);

        $id_auth= auth()->id();
        $role = User::find($id_auth);

        if(!$kegiatans) {
            abort(404);
        }
        return view('kegiatan/form-edit-kegiatan-pic', ['kegiatans' => $kegiatans, 'sportclubs'=> $sportclubs, 'role'=> $role]);
    }

    public function showCurrentKegiatanRutinPic($sportid, $id) {
        $kegiatans = Kegiatan::find($id);
        $sportclubs = Sport_Club::find($sportid);
        if(!$kegiatans) {
            abort(404);
        }

        $id_auth= auth()->id();
        $role = User::find($id_auth);

        return view('kegiatan/form-edit-kegiatan-rutin-pic', ['kegiatans' => $kegiatans, 'sportclubs'=> $sportclubs, 'role'=> $role]);
    }

    // routing ke method update
    public function updateIncedental(Request $request, $id) {
        // update biasa
        // $kegiatan = new Kegiatan;
        // $kegiatan->name = $request->name;
        // $kegiatan->time = $request->time;
        // $kegiatan->place = $request->place;
        // $kegiatan->activity_status = $request->activity_status;
        // $kegiatan->activity_participant = $request->activity_participant;
        // $kegiatan->budget = $request->budget;
        // $kegiatan->budget_type = $request->budget_type;
        // $kegiatan->information = $request->information;
        // $kegiatan->save();
        // return redirect('/kegiatan/list-kegiatan');

        $this->validate($request, [
			'name' => 'required',
            'id_club' => 'required',
            'start_time' => 'required',
            'finish_time' => 'required|after:start_time',
            'date' => 'required|after:today',
            'place' => 'required',
            'type' => 'required',
            'budget' => 'required|numeric',
            'information' => 'required',
            'proposal' => 'mimes:pdf',
            'poster' => 'mimes:jpeg,png,jpg',
        ]);
        
        if($request->file('poster') != null && $request->file('proposal') != null) {
            $poster = $request->file('poster');
            $proposal = $request->file('proposal');
            $proposal_name= rand(1, 9999).str_replace(' ', '_', $proposal->getClientOriginalName());
            $poster_name= rand(1, 9999).str_replace(' ', '_', $poster->getClientOriginalName());
            $tujuan_upload_poster = 'poster';
            $tujuan_upload_proposal = 'proposal';
    
            $poster->move($tujuan_upload_poster,$poster_name);
            $proposal->move($tujuan_upload_proposal,$proposal_name);

             // update mass assignment
            Kegiatan::where('id', $id)->update([
                'name' => $request->name,
                'id_club' => $request->id_club,
                'start_time' => $request->start_time,
                'finish_time' => $request->finish_time,
                'date' => $request->date,
                'place' => $request->place,
                // 'activity_status' => $request->activity_status,
                'type' => $request->type,
                'role' => $request->role,
                'budget' =>  $request->budget,
                'information' =>  $request->information,
                'is_approved' => 0,
                'budget_approved' => 0,
                'proposal' =>  $proposal_name,
                'poster' => $poster_name,
            ]);
        }
        // file validation
        // $validator      =   Validator::make($request->all(),
        // ['proposal'      =>   'required|mimes:doc, pdf'],
        // ['poster'      =>   'required|mimes:jpeg,png,jpg,bmp']);

        // update mass assignment
        Kegiatan::where('id', $id)->update([
            'name' => $request->name,
            'id_club' => $request->id_club,
            'start_time' => $request->start_time,
            'finish_time' => $request->finish_time,
            'date' => $request->date,
            'place' => $request->place,
            // 'activity_status' => $request->activity_status,
            'type' => $request->type,
            'role' => $request->role,
            'budget' =>  $request->budget,
            'information' =>  $request->information,
            'is_approved' => 0,
            'budget_approved' => 0,
        ]);

        return redirect('/kegiatan/list-kegiatan');
    }
    
    // routing ke method update
    public function updateIncedentalPic(Request $request, $id) {
        // update biasa
        // $kegiatan = new Kegiatan;
        // $kegiatan->name = $request->name;
        // $kegiatan->time = $request->time;
        // $kegiatan->place = $request->place;
        // $kegiatan->activity_status = $request->activity_status;
        // $kegiatan->activity_participant = $request->activity_participant;
        // $kegiatan->budget = $request->budget;
        // $kegiatan->budget_type = $request->budget_type;
        // $kegiatan->information = $request->information;
        // $kegiatan->save();
        // return redirect('/kegiatan/list-kegiatan');

        $this->validate($request, [
			'name' => 'required',
            'id_club' => 'required',
            'start_time' => 'required',
            'finish_time' => 'required|after:start_time',
            'date' => 'required|after:today',
            'place' => 'required',
            'type' => 'required',
            'budget' => 'required|numeric',
            'information' => 'required',
            'proposal' => 'mimes:pdf',
            'poster' => 'mimes:jpeg,png,jpg',
        ]);
        
        if($request->file('poster') != null && $request->file('proposal') != null) {
            $poster = $request->file('poster');
            $proposal = $request->file('proposal');
            $proposal_name= rand(1, 9999).str_replace(' ', '_', $proposal->getClientOriginalName());
            $poster_name= rand(1, 9999).str_replace(' ', '_', $poster->getClientOriginalName());
            $tujuan_upload_poster = 'poster';
            $tujuan_upload_proposal = 'proposal';
    
            $poster->move($tujuan_upload_poster,$poster_name);
            $proposal->move($tujuan_upload_proposal,$proposal_name);

             // update mass assignment
            Kegiatan::where('id', $id)->update([
                'name' => $request->name,
                'id_club' => $request->id_club,
                'start_time' => $request->start_time,
                'finish_time' => $request->finish_time,
                'date' => $request->date,
                'place' => $request->place,
                // 'activity_status' => $request->activity_status,
                'type' => $request->type,
                'role' => $request->role,
                'budget' =>  $request->budget,
                'information' =>  $request->information,
                'is_approved' => 0,
                'budget_approved' => 0,
                'proposal' =>  $proposal_name,
                'poster' => $poster_name,
            ]);
        }
        // file validation
        // $validator      =   Validator::make($request->all(),
        // ['proposal'      =>   'required|mimes:doc, pdf'],
        // ['poster'      =>   'required|mimes:jpeg,png,jpg,bmp']);

        // update mass assignment
        Kegiatan::where('id', $id)->update([
            'name' => $request->name,
            'id_club' => $request->id_club,
            'start_time' => $request->start_time,
            'finish_time' => $request->finish_time,
            'date' => $request->date,
            'place' => $request->place,
            // 'activity_status' => $request->activity_status,
            'type' => $request->type,
            'role' => $request->role,
            'budget' =>  $request->budget,
            'information' =>  $request->information,
            'is_approved' => 0,
            'budget_approved' => 0,
        ]);

        return redirect('/kegiatan/list-kegiatan-pic-all');
    }

    // routing ke method update
    public function updateRutin(Request $request, $id) {
        // update biasa
        // $kegiatan = new Kegiatan;
        // $kegiatan->name = $request->name;
        // $kegiatan->time = $request->time;
        // $kegiatan->place = $request->place;
        // $kegiatan->activity_status = $request->activity_status;
        // $kegiatan->activity_participant = $request->activity_participant;
        // $kegiatan->budget = $request->budget;
        // $kegiatan->budget_type = $request->budget_type;
        // $kegiatan->information = $request->information;
        // $kegiatan->save();
        // return redirect('/kegiatan/list-kegiatan');

        $this->validate($request, [
            'name' => 'required',
            'id_club' => 'required',
            'start_time' => 'required',
            'finish_time' => 'required|after:start_time',
            'date' => 'required|after:today',
            'place' => 'required',
            'type' => 'required',
            'poster' => 'mimes:jpeg,png,jpg',
        ]);
        
        if($request->file('poster') != null) {
            $poster = $request->file('poster');
            $poster_name= rand(1, 9999).str_replace(' ', '_', $poster->getClientOriginalName());
            $tujuan_upload_poster = 'poster';
    
            $poster->move($tujuan_upload_poster,$poster_name);
            // $proposal->move($tujuan_upload_proposal,$proposal_name);

             // update mass assignment
            Kegiatan::where('id', $id)->update([
                'name' => $request->name,
                'id_club' => $request->id_club,
                'start_time' => $request->start_time,
                'finish_time' => $request->finish_time,
                'date' => $request->date,
                'place' => $request->place,
                // 'activity_status' => $request->activity_status,
                'type' => $request->type,
                'role' => $request->role,
                // 'budget' =>  $request->budget,
                // 'information' =>  $request->information,
                'is_approved' => 0,
                'budget_approved' => 0,
                // 'proposal' => $request->proposal,
                'poster' => $poster_name,
            ]);
        }
        // file validation
        // $validator      =   Validator::make($request->all(),
        // ['proposal'      =>   'required|mimes:doc, pdf'],
        // ['poster'      =>   'required|mimes:jpeg,png,jpg,bmp']);

        // update mass assignment
        Kegiatan::where('id', $id)->update([
            'name' => $request->name,
            'id_club' => $request->id_club,
            'start_time' => $request->start_time,
            'finish_time' => $request->finish_time,
            'date' => $request->date,
            'place' => $request->place,
            // 'activity_status' => $request->activity_status,
            'type' => $request->type,
            'role' => $request->role,
            // 'budget' =>  $request->budget,
            // 'information' =>  $request->information,
            'is_approved' => 1,
            'budget_approved' => 0,
        ]);

        return redirect('/kegiatan/list-kegiatan');
    }

     // routing ke method update
     public function updateRutinPic(Request $request, $id) {
        // update biasa
        // $kegiatan = new Kegiatan;
        // $kegiatan->name = $request->name;
        // $kegiatan->time = $request->time;
        // $kegiatan->place = $request->place;
        // $kegiatan->activity_status = $request->activity_status;
        // $kegiatan->activity_participant = $request->activity_participant;
        // $kegiatan->budget = $request->budget;
        // $kegiatan->budget_type = $request->budget_type;
        // $kegiatan->information = $request->information;
        // $kegiatan->save();
        // return redirect('/kegiatan/list-kegiatan');

        $this->validate($request, [
            'name' => 'required',
            'id_club' => 'required',
            'start_time' => 'required',
            'finish_time' => 'required|after:start_time',
            'date' => 'required|after:today',
            'place' => 'required',
            'type' => 'required',
            'poster' => 'mimes:jpeg,png,jpg',
        ]);
        
        if($request->file('poster') != null) {
            $poster = $request->file('poster');
            $poster_name= rand(1, 9999).str_replace(' ', '_', $poster->getClientOriginalName());
            $tujuan_upload_poster = 'poster';
    
            $poster->move($tujuan_upload_poster,$poster_name);
            // $proposal->move($tujuan_upload_proposal,$proposal_name);

             // update mass assignment
            Kegiatan::where('id', $id)->update([
                'name' => $request->name,
                'id_club' => $request->id_club,
                'start_time' => $request->start_time,
                'finish_time' => $request->finish_time,
                'date' => $request->date,
                'place' => $request->place,
                // 'activity_status' => $request->activity_status,
                'type' => $request->type,
                'role' => $request->role,
                // 'budget' =>  $request->budget,
                // 'information' =>  $request->information,
                'is_approved' => 0,
                'budget_approved' => 0,
                // 'proposal' => $request->proposal,
                'poster' => $poster_name,
            ]);
        }
        // file validation
        // $validator      =   Validator::make($request->all(),
        // ['proposal'      =>   'required|mimes:doc, pdf'],
        // ['poster'      =>   'required|mimes:jpeg,png,jpg,bmp']);

        // update mass assignment
        Kegiatan::where('id', $id)->update([
            'name' => $request->name,
            'id_club' => $request->id_club,
            'start_time' => $request->start_time,
            'finish_time' => $request->finish_time,
            'date' => $request->date,
            'place' => $request->place,
            // 'activity_status' => $request->activity_status,
            'type' => $request->type,
            'role' => $request->role,
            // 'budget' =>  $request->budget,
            // 'information' =>  $request->information,
            'is_approved' => 1,
            'budget_approved' => 0,
        ]);

        return redirect('/kegiatan/list-kegiatan-pic-all');
    }

    // routing ke method update
    public function approveKegiatan(Request $request, $id) {
        // update mass assignment
        Kegiatan::where('id', $id)->update([
            'is_approved' => 1,
            'budget_approved' =>  $request->budget_approve,
        ]);

        return redirect('/kegiatan/list-kegiatan-approve');
    }

     // routing ke method update
     public function notApproveKegiatan(Request $request, $id) {
        // update mass assignment
        Kegiatan::where('id', $id)->update([
            'is_approved' => 2,
            'budget_approved' =>  0,
            'reason' =>  $request->reason,
        ]);

        return redirect('/kegiatan/list-kegiatan-approve');
    }

     // routing ke method update
     public function tinjauUlangKegiatan(Request $request, $id) {
        // update mass assignment
        Kegiatan::where('id', $id)->update([
            'is_approved' => 3,
            'budget_approved' =>  0,
            'reason' =>  $request->reason,
        ]);

        return redirect('/kegiatan/list-kegiatan-approve');
    }
    
}