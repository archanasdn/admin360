<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function index()
    {
        
        return view('auth.login');
    }

    
    public function check_login(Request $request)
    {
        $credentials = $request->only('email_address', 'password');
        if (Auth::attempt(['email' => $credentials['email_address'], 'password' => $credentials['password']])) {
            // Authentication passed, redirect to dashboard
            return redirect()->route('dashboard');
        } else {
            // Authentication failed, redirect back to login with an error message
            return redirect()->route('login')->withErrors(['error' => 'Invalid email or password.']);
        }
       

       
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
