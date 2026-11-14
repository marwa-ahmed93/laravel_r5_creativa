<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
      $users = User::all();  
//  dd($users);
       return view('user.index', compact('users'));
    }
    public function create()
    {
        return view('user.create');
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
      User::create([
        'name' => $validate['name'],
        'email' => $validate['email'],
        'password' => bcrypt($validate['password']),
      ]);


      return redirect()->route
      ('user.index')->with('success', 'User created successfully');

    }
       
}
