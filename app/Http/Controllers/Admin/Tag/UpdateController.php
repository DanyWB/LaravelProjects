<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\UpdateRequest;

class UpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(UpdateRequest $request, Tag $tag)
    {

        $tag->update($request->validated());



        return redirect()->route('admin.tag.index');

    }

}
