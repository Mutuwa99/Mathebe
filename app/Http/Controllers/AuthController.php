<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

use DB;

use Session;
session_start();

class AuthController extends Controller
{
    //
    public function login(Request $req){

        $email = $req->email;
        $password = md5($req->password);

        $check_users = DB::table('users')
                            ->where('email' ,'=',$email)
                            ->where('password', '=',$password)
                            ->first();

          if($check_users) {

            Session::put('email',$check_users->email);

            return Redirect::to('/dashboard');



          }else{

            return Redirect::to('/')->withFail(" Opps you have entered wrong credentials");

          }               
         

    }

    public function register(){

      return view('register');
    }

    public function register_form(Request $req){

        
      $email = $req->email;
      $password = md5($req->password);
      $check_users = DB::table('users')
      ->where('email' ,'=',$email)
      ->where('password', '=',$password)
      ->first();

      if(!$check_users) {

        $data = array();
        $data['email'] = $email;
        $data['password'] = $password;

    
      DB::table('users')
                ->insert($data);

        
      return Redirect::to('/')->withSuccess('registration has been successfull please login');



      }else{

      return Redirect::to('/')->withFail(" Email already exist please login");

      }               






    }


}
