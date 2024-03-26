<?php

namespace App\Http\Controllers\Admin\Main;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke()
    {
        $data = [];
        $data['userCount'] = User::all()->count();
        $data['tagCount'] = Tag::all()->count();
        $data['categoryCount'] = Category::all()->count();
        $data['postCount'] = Post::all()->count();


        return view('admin.main.index', compact('data'));
    }

}
