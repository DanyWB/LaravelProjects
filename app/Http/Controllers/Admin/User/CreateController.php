<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke()
    {


        $roles = User::getRoles();


        return view('admin.user.create',compact('roles'));
    }

}
