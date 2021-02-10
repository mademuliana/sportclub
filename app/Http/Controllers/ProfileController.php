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
use Auth;

class ProfileController extends Controller
{
    // routing ke page view my-profile
    public function gotoMyProfile() {
        $id_auth= auth()->id();
        $role = User::find($id_auth);

        return view('profile/my-profile', ['role'=>$role]);
    }
}
