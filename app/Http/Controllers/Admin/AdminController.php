<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class AdminController extends Controller
{
    public function edit(Post $post)
    {
      
            return view('Post.edit',compact('post'));

    }

    /**
     * Update the specified resource in storage.
     */
   
}
