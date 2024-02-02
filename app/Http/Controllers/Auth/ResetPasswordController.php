<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Models\User;
use App\Jobs\SendEmailJob;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
class ResetPasswordController extends Controller
{

  public function mailreset(){
    return view('auth.passwords.email');
  }

  public function postreset(Request $request){

   $request->validate([
    'email'=>'required|exists:users'
   ],['email.required' => 'vui lòng nhập địa chỉ email hợp lệ',
      'email.exists' => 'email này không tồn tại trong hệ thống'
   ]);

   $token = strtoupper(Str::random(10));
  $user = User::where('email', $request->email)->first();

 $user->update(['token'=>$token]);

 
  if ($user) {
      dispatch(new SendEmailJob($user));
  }

  return redirect()->back()->with('status', 'Password reset link has been sent!');
  }

  
  public function getPass(User $users,$token){

if($users->token === $token){

  return view('auth.passwords.reset');

}
    
    return abort(404);

}

public function postGetpass(User $users,Request $request){


  $users->update(['password' => bcrypt($request->password),'token'=>null]);

  Session::flash('alert', 'Đặt lại mật khẩu thành công');

  return redirect()->route('login');
    }


}
