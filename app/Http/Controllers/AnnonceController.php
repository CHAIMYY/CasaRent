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
            $annoncesQuery->where('categories_id', $categoryId);
        }
        if ($request->ajax()) {
            return view('home', compact('annonces'));
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


        // if ($request->ajax()) {
        //     return view('admin.allannonces', compact('annonces'));
        // }
    
        return view('admin.allannonces', compact('annonces','totalAnnonce','categories'));
    }
    


    public function delete(Annonce $annonce){
        $user = Auth::id();
        $annonce->delete();
        if(auth()->user()->role === 'admin'){
          return redirect()->route('viewAll');  
        }else{
        return redirect()->route('landlord.dashboard');
    
        }
        
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
        $annonce = Annonce::with('category', 'user')->find($id);
        
        return view('detail', compact('annonce'));
    }
    
    
    

    public function create(Request $request)
    {
            $categories = Category::all();

        // try {
            $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string'],
                'location' => ['required', 'string', 'max:255'],
                'price' => ['required', 'numeric'], 
                'image' => ['required', 'file'], // Change 'image' rule to 'file'
            ]);
            $user = auth()->user();

            $imageName = null;

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');

            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('images'), $imageName);
        }

            Annonce::create([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $imageName, 
                'location' =>  $request->location,
                'type' => $request->type,
                'price' => $request->price,
                'user_id' => $user->id,
                'categories_id' => $request->categories_id,
            ]);
           
            return redirect()->route('landlord.dashboard');
        // } catch (\Exception $e) {
        //     dd($e->getMessage());
        // }

        

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



    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'location' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'image' => ['nullable', 'file'], 
        ]);

        $user = auth()->user();
        $imageName = null;

       
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');

            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('images'), $imageName);
        }

        
        $annonce = Annonce::findOrFail($id);

       
        $annonce->update([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'type' => $request->type,
            'price' => $request->price,
            'categories_id' => $request->categories_id,
        ]);

       
        if ($imageName) {
            $annonce->image = $imageName;
            $annonce->save();
        }

        return redirect()->route('landlord.dashboard');
    }



}
