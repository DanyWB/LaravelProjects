<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\User\StoreRequest;

class StoreController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        $this->service->store($data);








       return redirect()->route('admin.user.index');

    }

}
