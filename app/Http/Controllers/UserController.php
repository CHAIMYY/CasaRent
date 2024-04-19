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


    public function stats() 
    {
        $totalcategories = Category::count();
        $totalannonces = Annonce::count();
        $totalusers = User::count();
        return view('admin.allannonces', compact('totalcategories','totalannonces','totalusers'));
    }


  
    // public function banUser($userId)
    // {
    //     $userId = User::find($userId);

    //     if ($userId) {

            
    //         $userId->update(['banned' => true]);
    //         if (auth()->check() && auth()->user()->id == $userId) {
    //             auth()->logout();
    //             return redirect()->route('login')->with('banned_message', 'You are banned from logging in.');
    //         }
           
    //         return redirect()->route('users')->with('success', 'User has been banned.');
    //     }

    //     return redirect()->route('users')->with('error', 'User not found.');
    // }


        public function banUser($userId)
        {
            $userToBan = User::find($userId);
        
            if ($userToBan) {
                // Check if the user to be banned is not an admin
                if ($userToBan->role !== 'admin') {
                    $userToBan->update(['banned' => true]);
                    if (auth()->check() && auth()->user()->id == $userToBan->id) {
                        auth()->logout();
                        return redirect()->route('login')->with('banned_message', 'You are banned from logging in.');
                    }
                    return redirect()->route('users')->with('success', 'User has been banned.');
                } else {
                    return redirect()->route('users')->with('error', 'You cannot ban an admin.');
                }
            }
        
            return redirect()->route('users')->with('error', 'User not found.');
        }
    



    public function unbanUser($userId)
    {
        $user = User::find($userId);
        if ($user) {
            $user->update(['banned' => false]);
            return redirect()->route('users')->with('success', 'User unbanned successfully.');
        }
        return redirect()->route('users')->with('error', 'User not found.');
    }




    public function statistics()
    {
        $usersCount = User::where('role', 'user')->count();
        $advertisersCount = User::where('role', 'advertiser')->count();
        $totalcategories = Category::count();
       
        $totalAnnonce = Annonce::count();
       
        return view('admin.statistique', compact('usersCount','advertisersCount', 'totalAnnonce','totalcategories'));
    }
}







// abstract class User {
//     // Propriétés
//     public $nom;
//     public $prenom;

//     // Méthodes abstraites
//     abstract public function nomComplet();
//     abstract public function lastName();
// }

// class Apprenant extends User {
//     // Propriété spécifique à la classe Apprenant
//     public $note;

//     // Constructeur
//     public function __construct($nom, $prenom, $note) {
//         $this->nom = $nom;
//         $this->prenom = $prenom;
//         $this->note = $note;
//     }

//     // Implémentation des méthodes abstraites
//     public function nomComplet() {
//         echo $this->nom . " " . $this->prenom;
//     }

//     public function lastName() {
//         echo $this->nom;
//     }
// }

// // Exemple d'utilisation
// $exemple = new Apprenant("Doe", "John", 18); // Création d'une instance de la classe Apprenant
// $exemple->nomComplet(); // Affiche le nom complet
// echo "\n";
// $exemple->lastName(); // Affiche seulement le nom












// abstract class shape {

//         protected $circle;
//         protected $triangle;


//         public function __construct($circle)
//         {
//             $this->circle = $circle;

//         }

//         public function rectangle (){

//             return 'triangle';
//         }

//         $circle = new rectangle() ;




// }
