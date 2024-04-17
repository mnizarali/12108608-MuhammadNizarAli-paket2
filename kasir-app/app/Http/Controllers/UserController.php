<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // View Login Page
    public function index() {
        return view('auth.login');
    }
    // Function auth for login & direct to dashboard
    public function auth(Request $request) {
        // input validation
        $request->validate([
            "email" => "required",
            "password" => "required"
        ]);
        //get data based on input email
        $user = User::Where('email', $request->email)->first();
        //
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
         
            if (Auth()->user()->role === 'admin') {
                return redirect('/dashboard/user')->with('success', 'login berhasil');
            } else {
                return redirect('/dashboard/product');
            }
            
        }

        return back()->with('err', 'login failed');
    }
    // function logout
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
