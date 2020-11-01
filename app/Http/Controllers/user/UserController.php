<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $redirectTo = '/user';

    public function index()
    {
        return view('user.index')->with('title','Home User Page');
    }


}
