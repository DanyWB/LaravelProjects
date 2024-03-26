<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke()
    {

        $categories = Category::orderBy('title')->get();
        $tags = Tag::orderBy('title')->get();


        return view('admin.posts.create',compact('categories', 'tags'));
    }

}
