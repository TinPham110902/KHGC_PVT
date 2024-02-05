<?php

namespace App\Services;

use App\Models\Post;
use App\Models\User;
use App\Http\Requests\postRequest;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyEmail;
use Illuminate\Mail\Message;

class PostService
{
    public function update(postRequest $request, Post $post)
    {
        $post->update([
            'description' => $request['description'],
            'title' => $request['title'],
            'content' => $request['content'],
        ]);
        if (Auth::User()->role == 'admin') {
            $post->update([
                'status' => $request['status'],
            ]);

            // $message='Bài viết có Tiêu đề:'.$request['title'].'của bạn đã được phê duyệt / từ chối';
            // Mail::to( FUser::Find($post->user_id)->email)->send(new MyEmail($message));


        }
    }
}