<?php

namespace App\Http\Controllers;

use App\Enums\EnumStatus;
use Illuminate\Http\Request;
use App\Http\Requests\postRequest;
use Auth;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;
use App\Services\PostService;

use App\Helper\FlashHelper;

class PostController extends Controller
{
    use SoftDeletes;
    private $postService;


    /**
     * Display a listing of the resource.
     */

    public function __construct(PostService $postService)
    {
        $this->middleware('auth')->except(['show_user_post', 'user_index']);
        $this->postService = $postService;
    }



    public function user_index()
    {
       
        $posts = Post::where('status', EnumStatus::UPDATED)->get();

        return view('post.user_index', compact('posts'));
    }


    public function show_user_post(Post $post)
    {

        return view('post.show_user_post', compact('post'));
    }

    public function index()
    {

        // Lấy người dùng đã đăng nhập
        $user = Auth::user();

        // Lấy danh sách các bài viết của người dùng đã đăng nhập cùng với thông tin về người dùng

        if (Auth::User()->role == 'admin') {

            $posts = Post::all();

            return view('Admin.admin-post', compact('posts'));
        }

        if (Auth::User()->role == 'user') {

            $posts = Post::with('user')->where('user_id', $user->id)->get();
            return view('post.index', compact('posts'));

        }


        return redirect()->route('admin.index');
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
    public function store(postRequest $request)
    {

        $post = Post::create([
            'user_id' => Auth::id(),
            'description' => $request['description'],
            'title' => $request['title'],
            'content' => $request['content'],
        ]);

        $post->addMediaFromRequest('thumbnail')
            ->usingName($post->id)
            ->toMediaCollection();


        FlashHelper::flashMessage('success', 'Tạo bài viết thành công');
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {

        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if (Auth::id() === $post->user_id) {
            return view('post.edit', compact('post'));

        }
        return abort('404');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(postRequest $request, Post $post)
    {

        //     $data = [
        //     'description' => $request->input('description'),
        //     'title' => $request->input('title'),
        //     'content' => $request->input('content'),
        // ];

        $this->postService->update($request, $post);

        if (Auth::User()->role == 'admin') {
            return redirect()->route('admin.post');
        }
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {


        $post->delete();

        FlashHelper::flashMessage('success', 'Bài viết đã được xoá thành công.');

        return redirect()->back();
    }

    public function destroyAll($id)
    {
        //$id=UserId
        $user = Auth::User()->findOrFail($id);
        $user->posts()->delete();

        FlashHelper::flashMessage('success', 'Bài viết đã được xoá thành công.');
        return redirect()->back();
    }

}
