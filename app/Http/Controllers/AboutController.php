<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        // Memanggil file about.blade.php di folder resources/views
        return view('about');
    }
}