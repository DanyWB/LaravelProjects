<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class DestroyController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(User $user)
    {

        if(1) {
            $user->delete();

            return redirect()->route('admin.user.index');
            }

            throw ValidationException::withMessages([
                'title' => 'Delete all posts with that category',
            ]);

            return redirect()->back();
        }


    }


