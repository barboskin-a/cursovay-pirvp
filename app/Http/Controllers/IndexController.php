<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

//ПАГИНАЦИЯ КАТАЛОГА НА ГЛАВНУЮ СТРАНИЦУ
class IndexController extends Controller
{
    public function index(){
        $products = Product::paginate(4);
        return view('index', compact('products'));
    }
}