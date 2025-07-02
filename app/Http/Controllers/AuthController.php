<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function actionLogin(Request $request)
    {
        $dataValid = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string']
        ]);

        //check email
        $user = User::where('email', $request->email)->first();
        if(!$user) return redirect()->back()->withErrors(['email' => 'User not registered'])->withInput($request->only('email'));

        $credential = request(['email', 'password']);

        if(Auth::attempt($credential)){
            return redirect()->intended('/')->with('success', 'Login successfully');
        } else {
            return redirect()->back()->withErrors(['email' => 'Email or password is not match'])->withInput($request->only('email'));
        }
    }

    public function pageRegister()
    {
        return view('auth.register');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged out');
    }
}
