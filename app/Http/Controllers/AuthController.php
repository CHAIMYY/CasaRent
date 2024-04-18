<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    } 

    public function loginPost(Request $request){

        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if(Auth::attempt($credentials)){
          
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->intended(route('users'));
            } elseif ($user->role == 'advertiser') {
                return redirect()->intended(route('landlord.dashboard'));
            } else {
                return redirect()->intended(route('home'));
            }
        }
        
        return redirect(route('login'))->with("error","Login details are not valid");
    }

   
    

    public function registerPost(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'role'=>'required|in:user,advertiser', 
        ]);
    
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['role'] = $request->role;
    
        $user = User::create($data);
    
        if(!$user){
            return redirect(route('register'))->with("error","Registration failed, try again");
        }
    
        
        if ($request->role == 'advertiser') {
            return redirect(route('landlord.dashboard'))->with("success","Registration success, login to access the app");
        } else {
            return redirect(route('home'))->with("success","Registration success, login to access the app");
        }
    }
    

        // public function logout(){
            
        //     Session::flush();
        //     Auth::logout();
        //     return redirect(route('login'));
        // }

        // public function logout(Request $request)
        // {
        //     Auth::logout();
    
        //     $request->session()->invalidate();
    
        //     $request->session()->regenerateToken();
    
        //     return redirect()->route('login')->with('success', 'You have been logged out.');
        // }

        public function logout(Request $request)
        {
            Auth::logout();
    
            $request->session()->invalidate();
    
            $request->session()->regenerateToken();
    
            return redirect('/');
        }
}
