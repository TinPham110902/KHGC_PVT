<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function home(){

        return view('User.home');
    }

    public function contact(){
        return view('User.contact');
    }

    public function sendMail(Request $request){

        $data = $request->all();

        $text=$data['text'];
        Mail::send('User.emails', $data, function($message) use ($data) {
            $message->to($data['MailName'], $data['Name'])->subject('Mail Contact');
        });
        
        return view('User.emails',compact('text'));

    }
}
