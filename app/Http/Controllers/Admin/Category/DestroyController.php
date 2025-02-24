<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\Admin\Category\UpdateRequest;

class DestroyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(Category $category)
    {

        if($category->canDelete) {
            $category->delete();

            return redirect()->route('admin.category.index');
            }

            throw ValidationException::withMessages([
                'title' => 'Delete all posts with that category',
            ]);

            return redirect()->back();
        }


    }


