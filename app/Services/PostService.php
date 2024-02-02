<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    public function update(array $data, string $id)
    {
        Post::where('id', $id)->update([
            'description' => $data['description'],
            'title' => $data['title'],
            'content' => $data['content'],
        ]);
    }
}