<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Models\User;
use App\Jobs\SendEmailJob;
class ResetPasswordController extends Controller
{

  public function mailreset(){
    return view('auth.passwords.email');
  }

  public function postreset(Request $request){

    $this->validate($request, [
      'email' => 'required|email',
  ]);

  $user = User::where('email', $request->email)->first();

  if ($user) {
      dispatch(new SendEmailJob($user));
  }

  return redirect()->back()->with('status', 'Password reset link has been sent!');
  }

}
