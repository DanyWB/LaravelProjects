<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;

class UpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(UpdateRequest $request, Category $category)
    {

        $category->update($request->validated());



        return redirect()->route('admin.category.index');

    }

}
