<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        
        if ($request ->isMethod('get'))
            return view('Auth.register');
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        
        return redirect()
                ->route('login')
                ->with('sucess', 'your account has been created!
                you can now login');

    }

    public function login(Request $request){
        if($request->isMethod('get')){
            return view('Auth.login');
        }
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){
            return redirect()
                    ->route('home')
                    ->with('success', 'you are logged in!');

        }
        
        return redirect()
                ->route('login')
                ->withErrors('Provided login information is not valid.');

    }
    public function logout(Request $request){
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('home')
            ->with('success','you are now logged out.');
    }
}
