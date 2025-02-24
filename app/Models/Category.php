<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $guarded = false;

    protected $table = "categories";

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function getCanDeleteAttribute()
    {
        return  !$this->hasMany;
    }
}
