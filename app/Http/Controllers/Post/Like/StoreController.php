<?php

namespace App\Http\Controllers\Post\Like;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class StoreController extends Controller
{


    public function __invoke(Post $post)
    {

        auth()->user()->likedPosts()->toggle($post->id);


        return redirect()->back();
    }

}
