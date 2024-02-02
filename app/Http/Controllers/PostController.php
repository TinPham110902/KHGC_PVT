<?php

namespace App\Http\Controllers;

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
         $this->postService = $postService;
     }
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
    public function store(postRequest $request)
    {

    Post::create([

    'user_id'=>Auth::id(),
    'description'=>$request['description'],
    'title' => $request['title'],
    'content' => $request['content'],
        ]);

        FlashHelper::flashMessage('success', 'Tạo bài viết thành công');
return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post=Post::find($id);
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    { 
        $post=Post::find($id);
        return view('post.edit',compact('post'));
  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(postRequest $request, string $id)
    {
        
        $data = [
        'description' => $request->input('description'),
        'title' => $request->input('title'),
        'content' => $request->input('content'),
    ];

    $this->postService->update($data, $id);
       

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
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
