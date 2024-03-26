<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(User $user)
    {
        $roles = User::getRoles();

        return view('admin.user.show', compact('user','roles'));
    }

}
