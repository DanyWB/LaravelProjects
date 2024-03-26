<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke()
    {
       

        $posts = Post::query()->with('tags')->get();



        return view('admin.posts.index' , compact('posts'));
    }

}
