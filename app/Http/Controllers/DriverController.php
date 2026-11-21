<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index(){
     $drivers =   Driver::paginate(10);
     return view('driver.index' , ['drivers' => $drivers]);

    }
}
