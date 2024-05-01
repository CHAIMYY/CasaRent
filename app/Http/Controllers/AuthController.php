<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\PasswordResetToken;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    } 

    public function loginPost(Request $request){

        // 'email'=>['required', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'],
        // 'password' => ['required', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}$/'],

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

   



    // public function store(RegisterRequest $request)
    // {
    //     $incomingFields = $request->validated();

    //     $incomingFields['password'] = bcrypt($incomingFields['password']);

    //     $file_extension = $request->image->getClientOriginalExtension();
    //     $file_name = time() . '.' . $file_extension;
    //     $path = 'images/users';
    //     $request->image->move($path, $file_name);

    //     $user = $this->userRepository->create($incomingFields);

    //     if ($incomingFields['role'] === 'client' || $incomingFields['role'] === 'renter' || $incomingFields['role'] === 'admin') {
    //         return redirect('login');
    //     } else {
    //         return redirect('/login')->with('error', 'Invalid role');
    //     }
    // }





    

    public function registerPost(Request $request){
        // die('oussama');
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'role'=>'required|in:user,advertiser', 
            
        ]);

        // die( 'azert'.$request->file('photo'));
        $photoName = null;
            if ($request->hasFile('photo')) {
                $photoFile = $request->file('photo');
                $photoName = time() . '.' . $photoFile->getClientOriginalExtension();
                $photoFile->move(public_path('images'), $photoName);
            }
    
            
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['role'] = $request->role;
        $data['photo'] = $photoName;
    
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
    


    // public function registerPost(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email|unique:users',
    //         'password' => 'required',
    //         'role' => 'required|in:user,advertiser',
    //         'photo' => ['nullable', 'image'],
    //     ]);
    
        
    //     $photoName = null;
    //     if ($request->hasFile('photo')) {
    //         $photoFile = $request->file('photo');
    //         $photoName = time() . '.' . $photoFile->getClientOriginalExtension();
    //         $photoFile->move(public_path('images'), $photoName);
    //     }
    
        
    //     $userData = [
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'role' => $request->role,
    //         'photo' => $photoName,
    //     ];
    
        
    //     $user = User::create($userData);
    
    //     if (!$user) {
    //         return redirect()->route('register')->with("error", "Registration failed, try again");
    //     }
    
       
    //     $redirectRoute = $request->role === 'advertiser' ? 'landlord.dashboard' : 'home';
    //     return redirect()->route($redirectRoute)->with("success", "Registration success, login to access the app");
    // }






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


        public function forgot (){

            return view('auth.forgot');
        }

      
public function ForgetPassword(Request $request) {
    // $request->validate([
    //     'email' => "required|email|exists:users,email",
    // ]);

    $token = Str::random(64);

    // Store the token in the database
    PasswordResetToken::updateOrCreate(
        ['email' => $request->email],
        ['token' => $token, 'created_at' => now()]
    );

    // Send the password reset email
    Mail::send("emails.ForgetPasswordEmail", ['token' => $token], function ($message) use ($request) {
        $message->to($request->email)
                ->subject('Reset Your Password');
    });

    return redirect()->to(route('forget.password'))->with("success", "Password reset email sent");
}
    
}
