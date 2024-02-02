<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
use App\Jobs\SendEmailJob;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Http\Request;
use App\View\Components\Alert;
use App\Helper\FlashHelper;

class LoginController extends Controller
{
  use AuthenticatesUsers;
  
  public $alert;
  public function __construct()
    {
      if(!Auth::check()){
         $this->middleware('guest')->except('logout');
      }
     $this->middleware('checkuserstatus');
   
    }
  public function login(){

    $alert = $this->alert;

    return view('auth.login',compact('alert'));
  }

  public function authenticated(Request $request){

  

   $user = User::where('email',$request-> email)->first();

   if($user && Hash::check($request->password, $user->password)){

    Auth::login($user);
   } 
   else{
    FlashHelper::flashMessage('warning', 'Sai tài khoản hoặc mật khẩu!');
    return redirect()->back();
   } 

   FlashHelper::flashMessage('success', 'Đăng nhập thành công');
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

  protected function redirectTo()
{
    return route('home'); // Thay 'home' bằng tên route của trang chính của bạn
}
 

}
