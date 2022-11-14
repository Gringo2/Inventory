<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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
        $user = User::where('email', $request['email'])->first();

        if(!$user){
            Log::info("wrong email");
            return redirect()
                ->route('login')->withErrors("user name doesn't exist!");
        } 
        
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){
            return redirect()
                    ->route('dashboard')
                    ->with('success', 'you are logged in!');

        }
        
        Log::info("wrong password");
        return redirect()
                ->route('login')
                ->withErrors('Password mismatch. please enter correct password!');

    }
    public function logout(Request $request){
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('dashboard')
            ->with('success','you are now logged out.');
    }
}
