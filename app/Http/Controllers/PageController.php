<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class PageController extends Controller
{
    //
    public function dashboard(){

        return view('pages.dashboard');
    }

}
