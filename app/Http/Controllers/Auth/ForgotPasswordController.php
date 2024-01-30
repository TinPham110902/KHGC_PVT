<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\resetRequest;
use Illuminate\Support\Facades\Session;
class ForgotPasswordController extends Controller
{
   public function reset(){
    return view('auth.passwords.reset');
   }

   public function postreset(resetRequest $request){

      $updated = User::where('email', $request->email)
      ->update(['password' => bcrypt($request->password)]);

      Session::flash('alert', 'Đặt lại mật khẩu thành công');

      return redirect()->route('login');
        }
  
}
