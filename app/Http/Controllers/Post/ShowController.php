<?php

namespace App\Http\Controllers\Post;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(Post $post)
    {
        $date = Carbon::parse($post->created_at);

        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id' ,'!=' ,$post->id)
            ->get()
            ->random(3);

        return view('post.show' , compact('post','date','relatedPosts'));
    }

}
