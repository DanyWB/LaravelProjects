<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke()
    {


        $users = User::query()->get();




        return view('admin.user.index' , compact('users' ));
    }

}
