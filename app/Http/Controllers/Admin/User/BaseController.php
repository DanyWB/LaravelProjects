<?php

namespace App\Http\Controllers\Admin\User;


use App\Service\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public $service;

    public function __construct(UserService $service) {

        $this->service = $service;
    }

}
