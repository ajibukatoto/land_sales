<?php
// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers; // Make sure to use the correct namespace

use Illuminate\Http\Request; // Import the Request class

class HomeController extends Controller // Extend the base Controller class
{
    public function index()
    {
        return view('home'); // This should match your home.blade.php view file
    }
}
