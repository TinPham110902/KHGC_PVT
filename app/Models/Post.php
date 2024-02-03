<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use App\Enums\EnumStatus;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Post extends Model implements HasMedia
{
  use SoftDeletes;
  use HasFactory;
  use InteractsWithMedia;
    protected $table = 'posts';

    protected $fillable = [
    'user_id',
      'title',
      'thumbnail',
      'slug',
      'content',
      'description',
      'status',
    ];

    protected $casts = [
        'status' => EnumStatus::class
    ];


    public function user()
{
    return $this->belongsTo(User::class);
}

protected static function boot()
{
    parent::boot();

    static::saving(function ($model) {
        $model->slug = Str::slug($model->title);
        $model->slug = static::makeUniqueSlug($model->slug, $model->id);
    });
}

public static function makeUniqueSlug($slug, $id = null)
{
    $originalSlug = $slug;
    $counter = 2;

    while (static::where('slug', $slug)->where('id', '!=', $id)->exists()) {
        $slug = $originalSlug . '-' . $counter;
        $counter++;
    }

    return $slug;
}


// public function getThumbnailAttribute()
// {
//     $imagePath = $this->attributes['image'];
//     $thumbnailPath = '';

//     return $thumbnailPath;
// }
}
