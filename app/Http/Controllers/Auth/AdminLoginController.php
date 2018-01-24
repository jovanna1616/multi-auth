<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
public function __construct()
{
    $this->middleware('guest:admin');
}

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        // validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        // attempt to log the user in
        // attempt will hash the psw and compare with hashed psw in DB
        if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
            // if successful then redirect
            return redirect()->intended(route('admin.dashboard'));
        }
        // if unseccessful then redirect back to login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
