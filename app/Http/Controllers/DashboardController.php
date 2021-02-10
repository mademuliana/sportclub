<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\Kegiatan;
use App\Models\Anggota;
use App\Models\User;
use App\Models\Presensi;
use App\Models\Sport_Club;
use App\Models\Inventaris;

class DashboardController extends Controller
{
    // routing ke page view dashboard based on user level
    public function gotoDashboardUser()
    {
        
        $presensi = Presensi::all();
        $anggotas = Anggota::all();
        $users = User::all();
        $sportclubs = Sport_Club::all();

        $id= Auth::id();
        $role = User::find($id);
        $now = Carbon::now();
        

        $anggota_id_array = Anggota::where('id_user',$id)->get()->pluck('id');
        $anggota_sport_array = Anggota::where('id_user',$id)->get()->pluck('id_sportclub');
        $anggota_sport_count = Anggota::where('id_user',$id)->count();
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

        return view('dashboard/user-dashboard', ['approve'=>$sportclub_approve,'anggota_sport_counts'=>$anggota_sport_count,'kegiatans_count' => $kegiatans_count,'kegiatans_include' => $kegiatan_join, 'role'=>$role,'sportclubs' => $sportclubs, 'kegiatans' => $kegiatans, 'anggotas' => $anggotas]);
    }

    public function gotoDashboardPic()
    {   
        $id= Auth::id();
        $role = User::find($id);
        $user_id = Sport_Club::where('pic',$role->id)->pluck('id');
        $kegiatans = DB::table('kegiatans')->where('deleted_at', null)->where('id_club',$user_id)->orderBy('id', 'DESC')->paginate(10);
        $presensi = Presensi::all();
        $anggotas =  DB::table('anggotas')->where('id_sportclub',$user_id)->where('deleted_at', null)->pluck('id_user');
        $anggotas_count = Anggota::where('id_sportclub',$user_id)->where('deleted_at', null)->count();
        $inventariss = DB::table('inventaris')->where('id_club',$user_id)->orderBy('name', 'ASC')->paginate(10);
        $anggota_data = User::whereIn('id',$anggotas)->orderBy('name', 'ASC')->paginate(10);
        $sportclubs = Sport_Club::where('pic',$role->id)->get();
        $presensi = Presensi::all();
        $users = DB::table('users')->where('deleted_at', null)->orderBy('name', 'ASC')->paginate(10);

        $sport_pic = Sport_Club::firstWhere('pic',$id);
        $sport=0;
        foreach($sport_pic as $sport_pics){
            $sport=$sport_pic->id;
        }
        
        
        $now = Carbon::now();
        $jan = Kegiatan::Where('id_club',$sport)->WhereMonth('date','01' )->WhereYear('date',$now->year)->count();
        $feb = Kegiatan::Where('id_club',$sport)->WhereMonth('date','02' )->WhereYear('date',$now->year)->count();
        $mar = Kegiatan::Where('id_club',$sport)->WhereMonth('date','03' )->WhereYear('date',$now->year)->count();
        $apr = Kegiatan::Where('id_club',$sport)->WhereMonth('date','04' )->WhereYear('date',$now->year)->count();
        $may = Kegiatan::Where('id_club',$sport)->WhereMonth('date','05' )->WhereYear('date',$now->year)->count();
        $jun = Kegiatan::Where('id_club',$sport)->WhereMonth('date','06' )->WhereYear('date',$now->year)->count();
        $jul = Kegiatan::Where('id_club',$sport)->WhereMonth('date','07' )->WhereYear('date',$now->year)->count();
        $aug = Kegiatan::Where('id_club',$sport)->WhereMonth('date','08' )->WhereYear('date',$now->year)->count();
        $sep = Kegiatan::Where('id_club',$sport)->WhereMonth('date','09' )->WhereYear('date',$now->year)->count();
        $oct = Kegiatan::Where('id_club',$sport)->WhereMonth('date','10' )->WhereYear('date',$now->year)->count();
        $nov = Kegiatan::Where('id_club',$sport)->WhereMonth('date','11' )->WhereYear('date',$now->year)->count();
        $des = Kegiatan::Where('id_club',$sport)->WhereMonth('date','12' )->WhereYear('date',$now->year)->count();

        return view('dashboard/pic-dashboard', [
            'role'=>$role,
            'sportclubs' => $sportclubs, 
            'kegiatans' => $kegiatans, 
            'anggotas' => $anggota_data, 
            'anggotas_count' => $anggotas_count, 
            'users' => $users, 
            'inventariss' => $inventariss,
            'jan' => $jan,
            'feb' => $feb,
            'mar' => $mar,
            'apr' => $apr,
            'may' => $may,
            'jun' => $jun,
            'jul' => $jul,
            'aug' => $aug,
            'sep' => $sep,
            'oct' => $oct,
            'nov' => $nov,
            'des' => $des,
            'tahun' => $now->year 
            ]);
    }

    public function searchKegiatanPic(Request $request)
	{
		// menangkap data pencarian
        $cari = $request->cari;
        $anggotas = Anggota::all();
        $presensi = Presensi::all();
        $anggotas = Anggota::all();
        $users = DB::table('users')->orderBy('name', 'ASC')->paginate(10);
        $sportclubs = Sport_Club::all();
        $inventariss = DB::table('inventaris')->orderBy('name', 'ASC')->paginate(10);
 
    	// mengambil data dari table users sesuai pencarian data
		$kegiatans = DB::table('kegiatans')->where('name','like',"%".$cari."%")->paginate();
 
    		// mengirim data users ke view index
		return view('dashboard/pic-dashboard', ['sportclubs' => $sportclubs, 'kegiatans' => $kegiatans, 'anggotas' => $anggotas, 'users' => $users, 'inventariss' => $inventariss]);
    }
    
    public function searchAnggotaPic(Request $request)
	{
		// menangkap data pencarian
        $cari = $request->cari;
        $anggotas = Anggota::all();
        $presensi = Presensi::all();
        $anggotas = Anggota::all();
        $kegiatans = DB::table('kegiatans')->orderBy('id', 'DESC')->paginate(10);
        $sportclubs = Sport_Club::all();
        $inventariss = DB::table('inventaris')->orderBy('name', 'ASC')->paginate(10);
        
 
    	// mengambil data dari table users sesuai pencarian data
		$users = DB::table('users')->where('name','like',"%".$cari."%")->paginate();
 
        // mengirim data users ke view index
		return view('dashboard/pic-dashboard', ['sportclubs' => $sportclubs, 'kegiatans' => $kegiatans, 'anggotas' => $anggotas, 'users' => $users, 'inventariss' => $inventariss]);
    }

    public function searchInventarisPic(Request $request)
	{
		// menangkap data pencarian
        $cari = $request->cari;
        $anggotas = Anggota::all();
        $presensi = Presensi::all();
        $anggotas = Anggota::all();
        $users = DB::orderBy('name', 'ASC')->paginate(10);
        $kegiatans = DB::table('kegiatans')->orderBy('id', 'DESC')->paginate(10);
        $sportclubs = Sport_Club::all();
 
    	// mengambil data dari table users sesuai pencarian data
		$inventariss = DB::table('inventaris')->where('name','like',"%".$cari."%")->paginate();
 
    		// mengirim data users ke view index
		return view('dashboard/pic-dashboard', ['sportclubs' => $sportclubs, 'kegiatans' => $kegiatans, 'anggotas' => $anggotas, 'users' => $users, 'inventariss' => $inventariss]);
    }

    public function gotoDashboardSuperAdmin()
    {
<<<<<<< HEAD
        $kegiatans = DB::table('kegiatans')->where('deleted_at', null)->orderBy('id', 'DESC')->paginate(10);
=======
        $kegiatans = DB::table('kegiatans')->orderBy('id', 'DESC')->paginate(10);
>>>>>>> 8124fa040b4c523c331f8007a2769b0f5498bcae

        $now = Carbon::now();
        $jan = Kegiatan::WhereMonth('date','01' )->WhereYear('date',$now->year)->count();
        $feb = Kegiatan::WhereMonth('date','02' )->WhereYear('date',$now->year)->count();
        $mar = Kegiatan::WhereMonth('date','03' )->WhereYear('date',$now->year)->count();
        $apr = Kegiatan::WhereMonth('date','04' )->WhereYear('date',$now->year)->count();
        $may = Kegiatan::WhereMonth('date','05' )->WhereYear('date',$now->year)->count();
        $jun = Kegiatan::WhereMonth('date','06' )->WhereYear('date',$now->year)->count();
        $jul = Kegiatan::WhereMonth('date','07' )->WhereYear('date',$now->year)->count();
        $aug = Kegiatan::WhereMonth('date','08' )->WhereYear('date',$now->year)->count();
        $sep = Kegiatan::WhereMonth('date','09' )->WhereYear('date',$now->year)->count();
        $oct = Kegiatan::WhereMonth('date','10' )->WhereYear('date',$now->year)->count();
        $nov = Kegiatan::WhereMonth('date','11' )->WhereYear('date',$now->year)->count();
        $des = Kegiatan::WhereMonth('date','12' )->WhereYear('date',$now->year)->count();

<<<<<<< HEAD
        $id= Auth::id();
        $role = User::find($id);
        
=======
>>>>>>> 8124fa040b4c523c331f8007a2769b0f5498bcae
        $presensi = Presensi::all();
        $anggotas = Anggota::all();
        $users = User::all();
        $sportclubs = DB::table('sport__clubs')->where('deleted_at', null)->orderBy('name', 'ASC')->paginate(10);

        $sportclub_id = Sport_Club::all()->pluck('id');
        $sportclub_name = Sport_Club::all()->pluck('name');
        $anggota_count = array();
        
        foreach ($sportclub_id as $sportclub_anggota) {
            $anggotas_count = Anggota::where('id_sportclub',$sportclub_anggota)->count();   
            $anggota_count[]=$anggotas_count; 
        }

        $inventariss = Inventaris::all();
        return view('dashboard/super-admin-dashboard', [
<<<<<<< HEAD
            'sportclub_name' => $sportclub_name,
            'sportclub_anggota' => $anggota_count,
            'role' => $role,
=======
>>>>>>> 8124fa040b4c523c331f8007a2769b0f5498bcae
            'sportclubs' => $sportclubs, 
            'kegiatans' => $kegiatans, 
            'anggotas' => $anggotas, 
            'inventariss' => $inventariss,
            'jan' => $jan,
            'feb' => $feb,
            'mar' => $mar,
            'apr' => $apr,
            'may' => $may,
            'jun' => $jun,
            'jul' => $jul,
            'aug' => $aug,
            'sep' => $sep,
            'oct' => $oct,
            'nov' => $nov,
            'des' => $des,
            'tahun' => $now->year
            ]);
    }

    public function searchKegiatanSuperAdmin(Request $request)
	{
		// menangkap data pencarian
        $cari = $request->cari;
        $anggotas = Anggota::all();
        $presensi = Presensi::all();
        $anggotas = Anggota::all();
        $users = User::all();
        $sportclubs = DB::table('sport__clubs')->orderBy('name', 'ASC')->paginate(10);
        $inventariss = Inventaris::all();
 
    	// mengambil data dari table users sesuai pencarian data
		$kegiatans = DB::table('kegiatans')->where('name','like',"%".$cari."%")->paginate();
 
    		// mengirim data users ke view index
		return view('dashboard/super-admin-dashboard', ['sportclubs' => $sportclubs, 'kegiatans' => $kegiatans, 'anggotas' => $anggotas, 'inventariss' => $inventariss]);
    }
    
    public function searchSportClubSuperAdmin(Request $request)
	{
		// menangkap data pencarian
        $cari = $request->cari;
        $anggotas = Anggota::all();
        $presensi = Presensi::all();
        $anggotas = Anggota::all();
        $kegiatans = DB::table('kegiatans')->orderBy('id', 'DESC')->paginate(10);
        $inventariss = Inventaris::all();

 
    	// mengambil data dari table users sesuai pencarian data
		$sportclubs = DB::table('sport__clubs')->where('name','like',"%".$cari."%")->paginate();
 
    		// mengirim data users ke view index
		return view('dashboard/super-admin-dashboard', ['sportclubs' => $sportclubs, 'kegiatans' => $kegiatans, 'anggotas' => $anggotas, 'inventariss' => $inventariss]);
	}

    // routing untuk method ikut sport club
    public function storeJoinEvent(Request $request, $id) {

        $id_user = Auth::id();
        $kegiatan = Kegiatan::find($id);
        $anggota = Anggota::where('id_user',$id_user)->where('id_sportclub',$kegiatan->id_club)->pluck('id');
        $keikutsertaan_count = Presensi::where('id_anggota',$anggota)->get()->count();
        $anggotas = null;
        foreach ($anggota as $anggota_id) {
            $anggotas=$anggota_id;
        }
        $anggota_check = Presensi::where('id_kegiatan',$id)->where('id_anggota',$anggota)->onlyTrashed()->count();
        if($anggota_check==0){
               
            $presensi = new Presensi;
            $presensi->id_anggota = $anggotas;
            $presensi->id_kegiatan = $id;
            $presensi->type = 1;
            $presensi->save();
            
        }else{
            $anggota_check = Presensi::where('id_kegiatan',$id)->where('id_anggota',$anggota)->onlyTrashed()->restore();
        }
        return redirect()->back()->with('alert','berhasil join kegiatan');;
    }

    public function UnjoinEvent(Request $request, $id) {

        $id_user = Auth::id();
        $kegiatan = Kegiatan::find($id);
        $anggota = Anggota::where('id_user',$id_user)->where('id_sportclub',$kegiatan->id_club)->pluck('id');
        $keikutsertaan_count = Presensi::where('id_anggota',$anggota)->get()->count();
        $anggotas = null;
        foreach ($anggota as $anggota_id) {
            $anggotas=$anggota_id;
        }

        if ($keikutsertaan_count>0) {
            $id_user= Auth::id();
            $Keikutsertaan = Presensi::where('id_kegiatan',$id)->where('id_anggota',$anggotas)->get()->each;
            $Keikutsertaan->delete();
            return redirect()->back()->with('alert','berhasil unjoin');
        }else{
            return redirect()->back()->with('alert','anda harus setidaknya join 1 event untuk unjoin');
        }

    }
}
