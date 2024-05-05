<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function view(){
        $categories = Category::all();
        return view('/admin/categories', [
            'categories' => $categories,
        ]);
    }

    public function create(Request $request){
        try{
            $request->validate([
                'name' => ['required','string','max:255'],
            ]);

            $user = Auth::user();

            Category::create([
                'name' => $request->name,
                // 'user_id' => $user->id,
            ]);
            return redirect()->route('categories');
        }catch(\Exception $e){
            dd($e->getMessage());
        }
    }



    public function update(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
            ]);
                $oneCategorie = Category::findOrFail($request->categorieID);
    
            $oneCategorie->update([
                'name' => $request->name,
            ]);
    
            return redirect()->route('categories');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }


    public function delete(Category $category){
        $category->delete();
        return redirect()->route('categories');
    }

  

}