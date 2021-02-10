<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnggaranController extends Controller
{
    // routing ke page view form-input-anggaran
    public function gotoFormInputAnggaran()
    {
        return view('anggota/form-input-anggaran');
    }
}
