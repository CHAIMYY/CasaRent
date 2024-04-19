<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Annonce;
use Illuminate\Support\Facades\Auth;

class AnnonceController extends Controller
{
    // public function viewClient()
    // {
    //     $user = Auth::id();
    //     $categories = Category::all();
    //     $annonces = Annonce::where('user_id', $user)
    //         ->orderby('created_at', 'desc')
    //         ->get();
    //     $annonces = Annonce::all();
    //     // dd($annonce);
    //     return view('home', compact('annonces'));

    // }

    public function viewClient(Request $request)
    {
        $categories = Category::all();
    
      
        $search = $request->input('search');
        $categoryId = $request->input('category_id');
    
      
        $annoncesQuery = Annonce::orderby('created_at', 'desc');
        if ($search) {
            $annoncesQuery->where('title', 'like', "%$search%");
        }
        if ($categoryId) {
            $annoncesQuery->where('category_id', $categoryId);
        }
    
       
        $annonces = $annoncesQuery->get();
    
        return view('home', compact('annonces', 'categories'));
    }
    



    // public function viewAll()
    // {
    //     $user = Auth::id();
    //     $categories = Category::all();
    //     $annonces = Annonce::orderby('created_at', 'desc')
    //         ->paginate(9);
    //     return view('admin.allannonces', compact('annonces'), compact('categories'));
    // }

    public function viewAll(Request $request)
    {
        $user = Auth::id();
        $totalAnnonce = Annonce::count();
        $categories = Category::count();
        $search = $request->input('search');
        $annoncesQuery = Annonce::orderby('created_at', 'desc');
        if ($search) {
            $annoncesQuery->where('title', 'like', "%$search%");
        }
        $annonces = $annoncesQuery->paginate(9);
    
        return view('admin.allannonces', compact('annonces','totalAnnonce','categories'));
    }
    


    public function delete(Annonce $annonce){
        $annonce->delete();
        return redirect()->route('viewAll');
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
        $annonce = Annonce::with('category', 'user')->findOrFail($id);
    
        return view('detail', compact('annonce'));
    }
    
    
    

    public function create(Request $request)
    {
        try {
            $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string'],
                'location' => ['required', 'string', 'max:255'],
                'price' => ['required', 'numeric'], 
                'image' => ['required', 'image'],
            ]);
            $user = auth()->user();
            Annonce::create([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $request->image,
                'location' =>  $request->location,
                'type' => $request->type,
                'price' => $request->price,
                'user_id' => $user->id,
                'categorie_id' => $request->categorieID,
            ]);
            return redirect()->route('landlord.dashboard');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        

    }

    // public function viewlandlord()
    // {
    //     $user = Auth::id();
    //     $categories = Category::all();
    //     $annonces = Annonce::where('user_id', $user)
    //         ->orderby('created_at', 'desc')
    //         ->paginate(9);
    //     // dd($evenements);
    //     return view('landlord.dashboard', compact('annonces'), compact('categories'));
    // }
  
    public function viewlandlord(Request $request)
{
    $user = Auth::id();
    $categories = Category::all();
    $search = $request->input('search');
    $annoncesQuery = Annonce::where('user_id', $user)->orderby('created_at', 'desc');
    if ($search) {
        $annoncesQuery->where('title', 'like', "%$search%");
    }
    $annonces = $annoncesQuery->paginate(9);

    return view('landlord.dashboard', compact('annonces', 'categories'));
}



}
