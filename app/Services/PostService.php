<?php

namespace App\Services;

use App\Models\Post;
use App\Http\Requests\postRequest;
class PostService
{
    public function update(postRequest $request, Post $post)
    {
        $post->update([
            'description' => $data['description'],
            'title' => $data['title'],
            'content' => $data['content'],
        ]);
    }
}