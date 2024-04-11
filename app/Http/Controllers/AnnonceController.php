<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Annonce;
use Illuminate\Support\Facades\Auth;

class AnnonceController extends Controller
{
    public function viewClient()
    {
        $user = Auth::id();
        $categories = Category::all();
        $annonces = Annonce::where('user_id', $user)
            ->orderby('created_at', 'desc')
            ->get();
        $annonces = Annonce::all();
        // dd($annonce);
        return view('home', compact('annonces'));

    }


    public function viewAll()
    {
        $user = Auth::id();
        $categories = Category::all();
        $annonces = Annonce::orderby('created_at', 'desc')
            ->paginate(9);
        return view('admin.allannonces', compact('annonces'), compact('categories'));
    }

    // public function viewClient(Request $request)
    // {
    //     $categories = Category::all();
    //     $query = Annonce::all();

    //     if ($request->has('search')) {
    //         $searchTerm = $request->input('search');
    //         $query->where('titre', 'like', '%' . $searchTerm . '%');
    //     }
    //     $annonces = $query->orderBy('created_at', 'desc')->paginate(9);
    //     return view('home', compact('annonces','categories'));
    // }


    public function showDetails($id)
    {
        $annonce = Annonce::findOrFail($id);

        return view('detail', compact('annonces'));
    }

    // public function search (Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //     ]);

    //     $titre = $request->input('title');

    //     $annonce = Annonce::where('title', 'like', "%$titre%")->get();

    //     return view('home', compact('annonces'));
    // }


  
}
