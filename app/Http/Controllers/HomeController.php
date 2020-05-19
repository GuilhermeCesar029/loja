<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    public function index(){
        $produtos = Product::all();
        return view('home', compact('produtos'));
    }
}
