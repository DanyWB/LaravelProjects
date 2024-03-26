<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(Tag $tag)
    {

        return view('admin.tags.show', compact('tag'));
    }

}
