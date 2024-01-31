<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostController extends Controller
{
    use SoftDeletes;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

         // Lấy người dùng đã đăng nhập
    $user = Auth::user();

    // Lấy danh sách các bài viết của người dùng đã đăng nhập cùng với thông tin về người dùng
    $posts = Post::with('user')->where('user_id', $user->id)->get();

    return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('post.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('post.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
       

        return redirect()->back()->with('success', 'Bài viết đã được xoá thành công.');
    }

    public function destroyAll($id)
    {
        //$id=UserId
        $user = Auth::User()->findOrFail($id);
        $user->posts()->delete();
       

        return redirect()->back()->with('success', 'Bài viết đã được xoá thành công.');
    }
   
}
