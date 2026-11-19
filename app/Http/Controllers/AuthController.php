<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
     public function register()
    {
        return view('auth.create');
    }
    public function store(Request $request)
    {
//validation
     $validate =   $request->validate([
        'name' => 'required|min:3|max:10',
        'email' => 'required|unique:users,email',
        'password' => 'required|min:6|max:12',
       ]);

       //crete user
      // User::create([   //ORM
      //   'name' => $validate['name'],
      //   'email' => $validate['email'],
      //   'password' => bcrypt($validate['password']),
      //   'role' => $validate['role'] ?? 'user',
      // ]);

      // DB::table('users')->insert([   //Query Builder
      //   'name' => $validate['name'],
      //   'email' => $validate['email'],
      //   'password' => bcrypt($validate['password']),
      //   'role' => $validate['role'] ?? 'user',
      // ]);

      $user = new User();
      $user->name = $validate['name'];
      $user->email = $validate['email'];
      $user->password = bcrypt($validate['password']);
      $user->role = $validate['role'] ?? 'user';
      $user->save();



      return redirect()->route
      ('login')->with('success', 'Register  successfully');

    }

public function loginForm(){
    return view('auth.login') ;
}

    public function login(Request $request){

       $validate =   $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:12',
           ]);

         $is_verify =   Auth::attempt(['email'=> $validate['email'] , 'password' => $validate['password']]) ;
       $user_name = Auth::user()->name;
         if($is_verify){
            return Redirect()->route('user.index')->with('success' , 'User Login Successfully  welcome ya :' . $user_name) ;
         }
         else{
            return Redirect()->back()->with('errors' , 'invalid email or password');
         }
    }



    public function logout(Request $request){
      Auth::logout();
      $request->session()->invalidate();
      return Redirect()->route('login')->with('success' , 'User Logout success');
    }
}
