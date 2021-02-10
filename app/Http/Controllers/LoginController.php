<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Auth;
use App\Http\Requests\LoginRequest;
=======
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
>>>>>>> 8124fa040b4c523c331f8007a2769b0f5498bcae
use Illuminate\Support\Facades\Session;
use App\Models\User ;
use App\Models\Anggota ;
use App\Models\Sport_Club ;
class LoginController extends Controller
{
    public function show()
    {
        return view('profile/login');
    }

    public function authenticate(LoginRequest $requestFields)
    {
        $attributes = $requestFields->only(['username', 'password']);
<<<<<<< HEAD
        if (Auth::attempt($attributes)) {
            $id= Auth::id();
            $role = User::find($id);
=======
        $users = User::all();
        $id=auth()->id();
        $role = User::find($id);
        if (Auth::attempt($attributes)) {
>>>>>>> 8124fa040b4c523c331f8007a2769b0f5498bcae
            if ($role->role==1) {
                return redirect('/dashboard/super-admin');
            }
            if ($role->role==2) {
<<<<<<< HEAD
                $admin= Anggota::all();
                $sportclub = Sport_Club::all();
                $admin_sportclub = Sport_Club::where('pic', $id);
=======
                $admin=Anggota::all();
                $sportclub = Sport_Club::all();
                $admin_sportclub= Anggota::where('id',$id);
>>>>>>> 8124fa040b4c523c331f8007a2769b0f5498bcae
                return redirect('/dashboard/pic');
            }
            if ($role->role==3) {
                return redirect('/dashboard/user');
            }
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return back();
    }
}
