<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
      // $users = DB::table('users')->get();  //Query Builder

     // $users = User::all();   //ORM 
    $users = User::paginate(6);

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
      ('user.index')->with('success', 'User created successfully');

    }
       


public function show($id)
    {
       // $user = User::findOrFail($id);  //ORM  404
    // $user =  DB::table('users')->where('id', $id)->first();  //Query Builder
        $user = DB::table('users')->find($id);  //Query Builder 404
        return view('user.show', compact('user'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }

}
