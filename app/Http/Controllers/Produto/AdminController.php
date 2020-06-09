<?php

namespace App\Http\Controllers\Produto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use App\Product;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){
        $produtos = Product::all();
        return view('admin.index', compact('produtos'));
    }
}
