<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Category;
use App\Models\PostUserLike;
use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use Filterable;

    protected $fillable = ['title', 'content', 'category_id','preview_image','main_image'];

    protected $table = "posts";


    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function comments() {
        return $this->morphMany(Comment::class, 'entity');
    }

    public function likedUsers() {
         return $this->belongsToMany(User::class , 'post_user_likes','post_id','user_id');
    }

    protected $withCount = ['likedUsers'];
}
