<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Annonce;
use Illuminate\Support\Facades\Auth;

class AnnonceController extends Controller
{
   

//     public function viewClient(Request $request)
// {
//     $categories = Category::all();

    
//     $search = $request->input('search');
//     $categoryId = $request->input('category_id');
//     $location = $request->input('location');

//     $annoncesQuery = Annonce::query()->orderBy('created_at', 'desc');

//     // Apply search filters
//     // if ($search) {
//     //     $annoncesQuery->where('title', 'like', "%$search%");
//     // }
//     // if ($location) {
//     //     $annoncesQuery->where('location', 'like', "%$location%");
//     // }
//     // if ($categoryId) {
//     //     $annoncesQuery->where('categories_id', $categoryId);
//     // }

//     if ($search && $location) {
//         $annoncesQuery->where(function($query) use ($search, $location) {
//             $query->where('title', 'like', "%$search%")
//                   ->orWhere('location', 'like', "%$location%");
//         });
//     } elseif ($search) {
//         $annoncesQuery->where('title', 'like', "%$search%");
//     } elseif ($location) {
//         $annoncesQuery->where('location', 'like', "%$location%");
//     }

//     if ($categoryId) {
//         $annoncesQuery->where('categories_id', $categoryId);
//     }

    
//     // if ($request->ajax()) {
//     //     $annonces = $annoncesQuery->get();
//     //     return view('home', compact('annonces'));
//     // }

 
//     $annonces = $annoncesQuery->get();

//     return view('home', compact('annonces', 'categories'));
// }

// public function viewClient(Request $request)
//     {
//         if ($request->has('search')) {
//             $searchTerm = $request->input('search');
//             $annonces = Annonce::where('title', 'like', '%' . $searchTerm . '%')
//                 ->orderBy('created_at', 'desc')
//                 ->with('category', 'user')
//                 ->paginate(9);

//             return response()->json(['annonces' => $annonces]);
//         } else {
//             $user = auth()->user();
//             $categories = Category::all();
//             $annonces = Annonce::orderBy('created_at', 'desc')
//                 ->with('category', 'user')
//                 ->paginate(20);

//             return view('home', compact('annonces', 'categories'));
//         }
//     }


public function viewClient(Request $request)
{
    $categories = Category::all();

    // Get search inputs
    $search = $request->input('search');
    $categoryId = $request->input('category_id');
    $location = $request->input('location');

    // Start building query
    $annoncesQuery = Annonce::query()->orderBy('created_at', 'desc');

    // Apply search filters
    // if ($search) {
    //     $annoncesQuery->where('title', 'like', "%$search%");
    // }
    // if ($location) {
    //     $annoncesQuery->where('location', 'like', "%$location%");
    // }
    // if ($categoryId) {
    //     $annoncesQuery->where('categories_id', $categoryId);
    // }

    if ($search && $location) {
        $annoncesQuery->where(function($query) use ($search, $location) {
            $query->where('title', 'like', "%$search%")
                  ->orWhere('location', 'like', "%$location%");
        });
    } elseif ($search) {
        $annoncesQuery->where('title', 'like', "%$search%");
    } elseif ($location) {
        $annoncesQuery->where('location', 'like', "%$location%");
    }

    // Apply category filter
    if ($categoryId) {
        $annoncesQuery->where('categories_id', $categoryId);
    }

    
    // if ($request->ajax()) {
    //     $annonces = $annoncesQuery->get();
    //     return view('home', compact('annonces'));
    // }

    // Get final result
    $annonces = $annoncesQuery->get();

    return view('home', compact('annonces', 'categories'));
}


 
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
    

  

    public function showDetails($id)
    {
        $annonce = Annonce::with('category', 'user')->find($id);
         return view('detail', compact('annonce'));
    }
    
    public function createAnnonce() 
    {
        $categories =Category::all();
        return view('landlord.create', compact('categories'));
    }
    

    public function create(Request $request)
    {
            $categories = Category::all();

        try {
            $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string'],
                'location' => ['required', 'string', 'max:255'],
                'price' => ['required', 'numeric'], 
                'image' => ['required', 'file'], 
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
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        

    }

   
  
    public function viewlandlord(Request $request)
{
    $user = Auth::id();
    $categories = Category::all();
    $AnnounceCount = Annonce::where('user_id', $user)->count();
    $search = $request->input('search');
    $annoncesQuery = Annonce::where('user_id', $user)->orderby('created_at', 'desc');
    if ($search) {
        $annoncesQuery->where('title', 'like', "%$search%");
    }
    $annonces = $annoncesQuery->paginate(20);

    return view('landlord.dashboard', compact('annonces', 'categories', 'AnnounceCount'));

    // if ($request->has('search')) {
    //     $searchTerm = $request->input('search');
    //     $articles = ArticleBlog::where('title', 'like', '%' . $searchTerm . '%')
    //         ->orderBy('created_at', 'desc')
    //         ->with('categorie', 'user')
    //         ->paginate(9);

    //     return response()->json(['articles' => $articles]);
    // } else {
    //     $user = auth()->user();
    //     $association = DB::table('users')
    //         ->join('associations', 'associations.user_id', '=', 'users.id')
    //         ->where('banned', 0)
    //         ->first();
    //     $categories = Categorie::all();
    //     $articles = ArticleBlog::orderBy('created_at', 'desc')
    //         ->with('categorie', 'user')
    //         ->paginate(9);

    //     return view('blog.accueil', compact('articles', 'categories', 'association', 'user'));
}



public function EditAnnoce($id) 
{
    $annonce = Annonce::findOrFail($id);
    $categories =Category::all();
    return view('landlord.updateAnnonce', compact('annonce' , 'categories'));
}




    public function update(Request $request, $id)
    {
        //dd($request);
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
