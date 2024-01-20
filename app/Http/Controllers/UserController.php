<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyEmail;
use App\Models\Users;
class UserController extends Controller
{
    public function home(){

        return view('User.home');
    }

    public function contact(){
        $Users= Users::all();
        return view('User.contact',compact('Users'));

        
    }

    public function sendMail(Request $request){

        $data = $request->all();

        $text=$data['text'];

        Mail::to('utru321@gmail.com')->send(new MyEmail($data));

        return redirect('home');

    }
}
