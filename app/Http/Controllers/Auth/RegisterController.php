<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\registerRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Mail;
use App\Mail\MyEmail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    public function register()
    {

        return view('auth.register');

    }

    public function create(registerRequest $request)
    {

        User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => $request['password'],
            'address' => $request['address'],
        ]);

        $message = 'Cảm ơn bạn đã đăng ký';
        Mail::to($request['email'])->send(new MyEmail($message));

        Session::flash('alert', 'Đăng ký tài khoản thành công');

        return redirect()->route('login');

    }
}
