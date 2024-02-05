<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Post;
use App\Models\User;
use App\Http\Requests\profileRequest;
use Illuminate\Http\Request;
class AdminController extends Controller
{
    public function edit(Post $post)
    {
      
            return view('Post.edit',compact('post'));

    }

    public function user()
    {

    

      $users = User::where('role','user')->get();
            return view('Admin.user',compact('users'));

    }
    public function user_edit(User $users)
    {

            return view('Admin.user_edit',compact('users'));

    }

    public function user_update(Request $request,User $users)
    {
        
        $users->update([
                'first_name' => $request->first_name,
                'last_name' =>  $request->last_name,
                'address' =>  $request->address,
                'status' => $request->status,
            ]);

            return redirect()->route('admin.user');

    }

    /**
     * Update the specified resource in storage.
     */
   
}
