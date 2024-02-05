<?php

namespace App\Services;

use App\Enums\EnumStatus;
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

            $allow='được phê duyệt';
            if($post->status== EnumStatus::DENIED)
            $allow='bị từ chối';
            $message='Bài viết có Tiêu đề:'.$request['title'].'của bạn đã '. $allow;

            Mail::to( User::Find($post->user_id)->email)->send(new MyEmail($message));


        }
    }
}