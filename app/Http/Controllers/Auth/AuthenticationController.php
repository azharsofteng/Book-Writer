<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authCheck(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:1',
        ]);
        try {
            $Credentials = $request->only('username', 'password');
            if(Auth::attempt($Credentials)) {
                return redirect()->intended('/dashboard');
                Toastr::success('Login Success!', 'Success', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
            }
            return redirect()->back()->withInput($request->only('username'))
            ->with('error', 'Username or Password was invalid.');
        } catch (\Exception $e) {
            return Redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function logout() 
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
