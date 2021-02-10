<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    /* @GET
    */
    public function loginForm()
    {
        return view('profile/login');
    }

    /* @POST
    */
    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
            ]);
        if (\Auth::attempt([
            'email' => $request->email,
            'password' => $request->password])
        ){
            return redirect('/');
        }
        return redirect('/login')->with('error', 'Invalid Email address or Password');
    }

    /* GET
    */
    public function logout(Request $request)
    {
        if(\Auth::check())
        {
            \Auth::logout();
            $request->session()->invalidate();
        }
        return  redirect('/login');
    }
}
