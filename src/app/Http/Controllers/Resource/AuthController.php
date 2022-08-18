<?php

namespace App\Http\Controllers\Resource;

use URL;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexLogin()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        
        $request->session()->regenerateToken();

        return redirect()->intended('/');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexRegister()
    {
        return view('Auth.register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8',
            'password_confirmation'  => 'required|same:password'
        ]);

        $user = User::create([
            'email' => $validatedData['email'],
            'name' => $validatedData['name'],
            'is_admin' => False,
            'password' => Hash::make($validatedData['password'])
        ]);

        return redirect('/login')->with('success', 'Registration succesfull!');
    }
}
