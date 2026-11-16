<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
   public function index(){
    $cars = Car::all();
    return view('car.index' , compact('cars'));
   }

   public function create(){
    return view('car.create');
   }

   public function store(Request $request){
    // Logic for storing a new car
//validation
       $validate =  $request->validate([
            
        'model' => 'required|string|max:255',
        'price' => 'required|numeric',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif']);

    // Store the car in the database (assuming you have a Car model)
    // Car::create($request->all());

    $image = 
    Storage::put('avatars',
     $validate['image']);


Car::create([
    
    'model' => $validate['model'],
    'price' => $validate['price'],
    'image' => $image 
]);



    return redirect()->route('car.index')->with('success', 'Car created successfully.');


   }
}
