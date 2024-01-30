<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;
class LoginController extends Controller
{

  public function __construct()
    {
     $this->middleware('checkuserstatus');
     
    }
  public function login(){

    return view('auth.login');
  }

  public function checklogin(){

   Session::flash('login', 'Đăng nhập thành công');

    return redirect()->route('post.index');
  }
  

}
