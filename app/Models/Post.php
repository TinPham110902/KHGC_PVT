<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
  use SoftDeletes;

    protected $table = 'posts';

    protected $fillable = [
      'thumbnail',
      'title',
      'status',
      'description'
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}
}
