<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyEmail;
use App\Models\User;
use App\Models\Post;
use Auth;
use  App\Http\Requests\profileRequest;
use Illuminate\Support\Facades\Session;
class UserController extends Controller
{
    public function home(){

        return view('User.home');
    }

    public function contact(){
        $Users= User::all();
        return view('User.contact',compact('Users'));

        
    }

    public function sendMail(Request $request){

        $data = $request->all();

        $text=$data['text'];

        Mail::to('utru321@gmail.com')->send(new MyEmail($data));

        return redirect('home');

    }

    public function profile(){

        $user = Auth::user();
        return view('User.profile',compact('user'));
    
    }

    public function profile_edit(){

        $user = Auth::user();
        return view('User.profile_edit',compact('user'));
    
    }

    public function profile_edit_post(profileRequest $request){



        User::where('id', Auth::id())->update([
            'first_name' => $request->first_name,
            'last_name' =>  $request->last_name,
            'address' =>  $request->address,
        ]);

        Session::flash('alert', 'Cập nhật hồ sơ thành công');
        return redirect()->route('profile');
    
    }

}
