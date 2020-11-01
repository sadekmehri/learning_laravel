<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginUser;
use App\Models\SecurityQuestion;
use Illuminate\Support\Facades\Auth;
class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function index()
    {
        return view('register.index')->with('title','Login Page');
    }

    public function email()
    {
        return view('register.email')->with('title','Reset Account Page');
    }

    public function getSecurityQuestion()
    {
        return response()->json(SecurityQuestion::all(),200);
    }

    public function authenticate(LoginUser $request)
    {
        $request->validated();
        $user = array(
            'email_user' => $request->get("email"),
            'password' => $request->get("password")
        );

        if( !Auth::attempt($user) )
            return redirect()->route('home.login')->with('error','User doesn\'t exist please try again.');

        if( Auth::check() && Auth::user()->email_verified_user == 0 )
            return redirect()->route('home.index')->with('error','Please Verify Your Email Please .');

        return redirect()->route('home.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home.index');
    }

}
