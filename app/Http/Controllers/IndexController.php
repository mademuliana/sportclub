<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{

    // routing ke view welcome
    public function gotoIndex() 
    {
        return view('welcome');
    }

    // routing ke view list
    public function gotoList()
    {
        return view('list');
    }
}
