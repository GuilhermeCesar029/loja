<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    public function index(){
        $produtos = Product::paginate(6);
        return view('home.index', compact('produtos'));
    }

    public function produto($id){
        //se nao for vazia
        if(!empty($id)){
            $produto = Product::where([
                'id' => $id
            ])->first();

            if(!empty($produto)){
                return view('home.produto', compact('produto'));
            }
        }
    }
}
