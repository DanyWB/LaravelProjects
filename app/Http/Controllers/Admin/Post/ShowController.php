<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(Post $post)
    {

        $categories = Category::orderBy('title')->get();
        $tags = Tag::orderBy('title')->get();

        return view('admin.posts.show', compact('post','categories','tags'));
    }

}
