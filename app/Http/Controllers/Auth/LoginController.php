<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;
use App\Jobs\SendEmailJob;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
class LoginController extends Controller
{
  use AuthenticatesUsers;

  public function __construct()
    {
     $this->middleware('checkuserstatus');
     
    }
  public function login(){

    return view('auth.login');
  }

  public function authenticated(Request $request){

   Session::flash('login', 'Đăng nhập thành công');

   $user = User::where('email',$request-> email)->first();
   Auth::login($user);
    return redirect()->route('post.index');
  }

  public function logout()
{
    Auth::logout();
    
    return redirect('/login');
}
  
  public function reset(){
    return view('auth.passwords.email');
  }

  // public function postreset(Request $request){

  //   $this->validate($request, [
  //     'email' => 'required|email',
  // ]);

  // $user = User::where('email', $request->email)->first();

  // if ($user) {
  //     dispatchNow(new SendPasswordResetEmailJob($user));
  // }

  // return redirect()->back()->with('status', 'Password reset link has been sent!');
  // }

}
