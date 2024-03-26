<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Filters\PostFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\Filter as FilterRequest;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(PostFilter::class, ['queryParams'=> array_filter($data)]);


        $posts = Post::filter($filter)->with('category')->orderBy('title', 'asc')->paginate(6);


        $randomPosts = Post::get()->random(4);
        $popularPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'desc')->get()->take(4);
        $categories = Category::all();

        return view('post.index' , compact('posts' , 'randomPosts','popularPosts', 'categories'));
    }

}
