<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Kegiatan;
use App\Models\User;
use App\Models\Presensi;
use App\Models\Anggota;
use Auth;

class PresensiController extends Controller
{
    // routing ke page view form-input-presensi
    public function gotoFormInputPresensi($id)
    {
        $anggotas = Anggota::all();
        $kegiatans = Kegiatan::find($id);
        $presensi = Presensi::all();
        $users = User::all();

        $id_auth= auth()->id();
        $role = User::find($id_auth);
        
        if(!$kegiatans) {
            abort(404);
        }    

       return view('presensi/form-input-presensi', array('kegiatans'=>$kegiatans, 'presensis'=>$presensi, 'anggotas'=>$anggotas, 'users'=>$users, 'role'=>$role));
    }

    // routing ke page view form-input-presensi
    public function gotoFormInputPresensiPic($id)
    {
        $anggotas = Anggota::all();
        $kegiatans = Kegiatan::find($id);
        $presensi = Presensi::all();
        $users = User::all();

        $id_auth= auth()->id();
        $role = User::find($id_auth);
        
        if(!$kegiatans) {
            abort(404);
        }    

       return view('presensi/form-input-presensi-pic', array('kegiatans'=>$kegiatans, 'presensis'=>$presensi, 'anggotas'=>$anggotas, 'users'=>$users, 'role'=>$role));
    }

    // routing ke method update data presensi kegiatan
    public function updatePresensi(Request $request, $id) {
        // // update biasa
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

        // To see all the posted stuff
        // dd($request->all());

        $id_kegiatan = $id;

        $this->validate($request, [
            'presensi' => 'required',
            'kwitansi' => 'required|mimes:pdf',
            'data_absen' => 'required|mimes:pdf',
        ]);

        $kwitansi = $request->file('kwitansi');
        $data_absen = $request->file('data_absen');

        $data_absen_name= rand(1, 9999).str_replace(' ', '_', $data_absen->getClientOriginalName());
        $kwitansi_name= rand(1, 9999).str_replace(' ', '_', $kwitansi->getClientOriginalName());

        $tujuan_upload_kwitansi = 'kwitansi';
        $tujuan_upload_data_absen = 'data_absen';

        $kwitansi->move($tujuan_upload_kwitansi,$kwitansi_name);
        $data_absen->move($tujuan_upload_data_absen,$data_absen_name);

        // $press gak guna
        foreach ($request->presensi_id as $presensiid => $pres) {
             // update mass assignment
            Presensi::where('id', $presensiid)->update([
                'type' => $request->presensi[$presensiid],
            ]);
        }

         // update mass assignment
         Kegiatan::where('id', $id_kegiatan)->update([
            'data_absen' => $data_absen_name,
            'kwitansi' => $kwitansi_name,
        ]);

        return redirect('/kegiatan/list-kegiatan');
    }

    // routing ke method update data presensi kegiatan
    public function updatePresensiPic(Request $request, $id) {
        // // update biasa
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

        // To see all the posted stuff
        // dd($request->all());

        $id_kegiatan = $id;

        $this->validate($request, [
            'presensi' => 'required',
            'kwitansi' => 'required|mimes:pdf',
            'data_absen' => 'required|mimes:pdf',
        ]);

        $kwitansi = $request->file('kwitansi');
        $data_absen = $request->file('data_absen');

        $data_absen_name= rand(1, 9999).str_replace(' ', '_', $data_absen->getClientOriginalName());
        $kwitansi_name= rand(1, 9999).str_replace(' ', '_', $kwitansi->getClientOriginalName());

        $tujuan_upload_kwitansi = 'kwitansi';
        $tujuan_upload_data_absen = 'data_absen';

        $kwitansi->move($tujuan_upload_kwitansi,$kwitansi_name);
        $data_absen->move($tujuan_upload_data_absen,$data_absen_name);

        // $press gak guna
        foreach ($request->presensi_id as $presensiid => $pres) {
             // update mass assignment
            Presensi::where('id', $presensiid)->update([
                'type' => $request->presensi[$presensiid],
            ]);
        }

         // update mass assignment
         Kegiatan::where('id', $id_kegiatan)->update([
            'data_absen' => $data_absen_name,
            'kwitansi' => $kwitansi_name,
        ]);

        return redirect('/dashboard/pic');
    }
}
