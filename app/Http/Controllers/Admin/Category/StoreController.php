<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        Category::firstOrCreate($data);


        return redirect()->route('admin.category.index');
    }

}
