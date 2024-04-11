<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Category;
use App\Models\Annonce;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function viewUsers()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function searchUsers(Request $request)
    {
        
        $searchTerm = $request->input('search');


        $users = User::where('name', 'like', '%' . $searchTerm . '%')->get();


        return view('admin.users', compact('users'));
    }


    public function stats() {
        $totalcategories = Category::count();
        $totalannonces = Annonce::count();
        $totalusers = User::count();
        return view('admin.allannonces', compact('totalcategories','totalannonces','totalusers'));
    }


  
    public function banUser($userId)
    {
        $user = User::find($userId);

        if ($user) {
            $user->update(['banned' => true]);
            if (auth()->check() && auth()->user()->id == $userId) {
                auth()->logout();
                return redirect()->route('login')->with('banned_message', 'You are banned from logging in.');
            }

            return redirect()->route('users')->with('success', 'User has been banned.');
        }

        return redirect()->route('users')->with('error', 'User not found.');
    }

}
