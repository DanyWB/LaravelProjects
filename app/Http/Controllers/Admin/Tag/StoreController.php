<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        Tag::firstOrCreate($data);


        return redirect()->route('admin.tag.index');
    }

}
