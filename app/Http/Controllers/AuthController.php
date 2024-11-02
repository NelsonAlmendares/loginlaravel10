<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function Register ()
    {
        return view('register');
    }

    public function RegisterPost (Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return back()->with('success', 'Register succesfully!');
    }

    public function Login ()
    {
        return view('login');
    }

    public function LoginPost (Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect('/home')->with('success', 'Login bershil');
        }

        return back()->with('error', 'Email or password wrong!');
    }

    public function Logout ()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
