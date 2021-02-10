<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Inventaris;
use App\Models\Sport_Club;
use App\Models\User;
use Auth;

class InventarisController extends Controller
{
    // routing ke page view list-inventaris
    public function gotoListInventaris()
    {
        //mengambil semua data inventaris
        $inventariss = DB::table('inventaris')->where('deleted_at', null)->orderBy('id', 'DESC')->paginate(10);
        $sportclubs = Sport_Club::all();

        $id_auth= auth()->id();
        $role = User::find($id_auth);

        //mengirim semua data inventaris kedalam view list inventaris melalui variable inventaris
        return view('inventaris/list-inventaris', ['inventariss'=>$inventariss, 'sportclubs'=>$sportclubs, 'role'=>$role]);
    }

    // routing ke page view list-inventaris PIC
    public function gotoListInventarisPic($id)
    {
        //mengambil semua data inventaris
        $inventariss = DB::table('inventaris')->where('deleted_at', null)->orderBy('id', 'DESC')->paginate(10);
        $sportclubs = Sport_Club::find($id);

        $id_auth= auth()->id();
        $role = User::find($id_auth);

        //mengirim semua data inventaris kedalam view list inventaris melalui variable inventaris
        return view('inventaris/list-inventaris-pic', ['inventariss'=>$inventariss, 'sportclubs'=>$sportclubs, 'role'=>$role]);
    }

    public function showDetailInventaris($id) {
        $inventariss = Inventaris::find($id);
        $sportclubs = Sport_Club::all();
        $id_auth= auth()->id();
        $role = User::find($id_auth);
        if(!$inventariss) {
            abort(404);
        }
        return view('inventaris/detail-inventaris', ['inventariss' => $inventariss, 'sportclubs'=>$sportclubs, 'role'=>$role]);
    }

    public function showDetailInventarisPic($id) {
        $inventariss = Inventaris::find($id);
        $sportclubs = Sport_Club::all();
        $id_auth= auth()->id();
        $role = User::find($id_auth);
        if(!$inventariss) {
            abort(404);
        }
        return view('inventaris/detail-inventaris-pic', ['inventariss' => $inventariss, 'sportclubs'=>$sportclubs, 'role'=>$role]);
    }

    public function search(Request $request)
	{
		// menangkap data pencarian
        $cari = $request->cari;
        $sportclubs = Sport_Club::all();
 
    	// mengambil data dari table users sesuai pencarian data
		$inventariss = DB::table('inventaris')->where('name','like',"%".$cari."%")->paginate();
 
        $id_auth= auth()->id();
        $role = User::find($id_auth);

    		// mengirim data users ke view index
		return view('inventaris/list-inventaris', ['inventariss'=>$inventariss, 'sportclubs'=>$sportclubs, 'role'=>$role]);
 
    }
    
    public function searchPic(Request $request, $id)
	{
		// menangkap data pencarian
        $cari = $request->cari;
        $sportclubs = Sport_Club::find($id);
 
    	// mengambil data dari table users sesuai pencarian data
		$inventariss = DB::table('inventaris')->where('name','like',"%".$cari."%")->paginate();
 
        $id_auth= auth()->id();
        $role = User::find($id_auth);

    		// mengirim data users ke view index
		return view('inventaris/list-inventaris-pic', ['inventariss'=>$inventariss, 'sportclubs'=>$sportclubs, 'role'=>$role]);
 
	}

    //delete inventaris
    public function destroy($id) {

        // soft deletes
        $inventaris = Inventaris::find($id);
        $inventaris->delete();
        return redirect('/inventaris/list-inventaris');
    }

    //delete inventaris
    public function destroyPic($id) {

        // soft deletes
        $inventaris = Inventaris::find($id);
        $inventaris->delete();
        return redirect('/dashboard/pic');
    }

    // routing ke page view form-input-inventaris
    public function gotoFormInputInventaris()
    {
        $sportclubs = Sport_Club::all();

        $id_auth= auth()->id();
        $role = User::find($id_auth);

        return view('inventaris/form-input-inventaris', ['sportclubs'=>$sportclubs, 'role'=>$role]);
    }

    // routing ke page view form-input-inventaris
    public function gotoFormInputInventarisPic($id)
    {
        $sportclubs = Sport_Club::find($id);

        $id_auth= auth()->id();
        $role = User::find($id_auth);

        return view('inventaris/form-input-inventaris-pic', ['sportclubs'=>$sportclubs, 'role'=>$role]);
    }
    
     // route untuk method CREATE new inventaris
     public function store(Request $request) {

        $this->validate($request, [
			'name' => 'required',
            'id_club' => 'required',
            'condition' => 'required',
            'price' => 'required|numeric',
            'time_purchased' => 'required',
            'information' => 'required',
        ]);

        $inventaris = new Inventaris;
        $inventaris->name = $request->name;
        $inventaris->id_club = $request->id_club;
        $inventaris->condition = $request->condition;
        $inventaris->price = $request->price;
        $inventaris->time_purchased = $request->time_purchased;
        $inventaris->information = $request->information;
        $inventaris->save();
        return redirect('/inventaris/list-inventaris');
    }

    // route untuk method CREATE new inventaris-pic
    public function storePic(Request $request) {

        $this->validate($request, [
			'name' => 'required',
            'id_club' => 'required',
            'condition' => 'required',
            'price' => 'required|numeric',
            'time_purchased' => 'required',
            'information' => 'required',
        ]);

        $inventaris = new Inventaris;
        $inventaris->name = $request->name;
        $inventaris->id_club = $request->id_club;
        $inventaris->condition = $request->condition;
        $inventaris->price = $request->price;
        $inventaris->time_purchased = $request->time_purchased;
        $inventaris->information = $request->information;
        $inventaris->save();

        return redirect('/dashboard/pic');
    }

    public function showCurrentInventaris($id) {
        $inventariss = Inventaris::find($id);
        $sportclubs = Sport_Club::all();
        $id_auth= auth()->id();
        $role = User::find($id_auth);
        if(!$inventariss) {
            abort(404);
        }
        return view('inventaris/form-edit-inventaris', ['inventariss' => $inventariss, 'sportclubs'=>$sportclubs, 'role'=>$role]);
    }

    public function showCurrentInventarisPic($id) {
        $inventariss = Inventaris::find($id);
        $sportclubs = Sport_Club::all();
        $id_auth= auth()->id();
        $role = User::find($id_auth);
        if(!$inventariss) {
            abort(404);
        }
        return view('inventaris/form-edit-inventaris-pic', ['inventariss' => $inventariss, 'sportclubs'=>$sportclubs, 'role'=>$role]);
    }
    // routing ke method update
    public function update(Request $request, $id) {
        // // update biasa
        // $inventaris = new Kegiatan;
        // $inventaris->name = $request->name;
        // $inventaris->time = $request->time;
        // $inventaris->place = $request->place;
        // $inventaris->activity_status = $request->activity_status;
        // $inventaris->activity_participant = $request->activity_participant;
        // $inventaris->budget = $request->budget;
        // $inventaris->budget_type = $request->budget_type;
        // $inventaris->information = $request->information;
        // $inventaris->save();
        // return redirect('/inventaris/list-inventaris');

        $this->validate($request, [
			'name' => 'required',
            'id_club' => 'required',
            'condition' => 'required',
            'price' => 'required|numeric',
            'time_purchased' => 'required',
            'information' => 'required',
        ]);

        // update mass assignment
        Inventaris::where('id', $id)->update([
           'name' => $request->name,
           'id_club' => $request->id_club,
           'condition' => $request->condition,
           'price' => $request->price,
           'time_purchased' => $request->time_purchased,
           'information' =>  $request->information,
        ]);

        return redirect('/inventaris/list-inventaris');
  
    }

    // routing ke method update
    public function updatePic(Request $request, $id) {
        // // update biasa
        // $inventaris = new Kegiatan;
        // $inventaris->name = $request->name;
        // $inventaris->time = $request->time;
        // $inventaris->place = $request->place;
        // $inventaris->activity_status = $request->activity_status;
        // $inventaris->activity_participant = $request->activity_participant;
        // $inventaris->budget = $request->budget;
        // $inventaris->budget_type = $request->budget_type;
        // $inventaris->information = $request->information;
        // $inventaris->save();
        // return redirect('/inventaris/list-inventaris');

        $this->validate($request, [
			'name' => 'required',
            'id_club' => 'required',
            'condition' => 'required',
            'price' => 'required|numeric',
            'time_purchased' => 'required',
            'information' => 'required',
        ]);

        // update mass assignment
        Inventaris::where('id', $id)->update([
           'name' => $request->name,
           'id_club' => $request->id_club,
           'condition' => $request->condition,
           'price' => $request->price,
           'time_purchased' => $request->time_purchased,
           'information' =>  $request->information,
        ]);

        return redirect('/dashboard/pic');
  
    }
}
