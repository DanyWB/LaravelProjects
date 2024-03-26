<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(Category $category)
    {

        return view('admin.categories.show', compact('category'));
    }

}
