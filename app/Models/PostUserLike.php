<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostUserLike extends Model
{
    use HasFactory;

    protected $guarded = false;

    protected $table = "post_user_likes";

    public function likedPosts() {
        return belongsToMany(Post::class);
    }
}
