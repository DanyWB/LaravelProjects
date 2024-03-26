<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\User\UpdateRequest;

class UpdateController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(UpdateRequest $request, User $user)
    {
        $data = $request->validated();

        $this->service->update($data,$user);

        return redirect()->route('admin.user.index');

    }

}
