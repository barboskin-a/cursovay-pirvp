<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', ['title' => 'Admin Dashboard']);
    }

    public function users(){
        return view('admin.users.index');
    }

    public function index()
    {
        return view('catalog_admin', [
            'products' => Product::all(),
        ]);
    }

//    Удаление товара

    public function destroyProduct(string $id)
    {
        Product::where('id', $id)->delete();
        return back();
    }

//    Добавление товара

    public function createProduct(Request $request)
    {
        $validated = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'quantity_product' => 'required|integer',
            'creator' => 'required|string|max:255',
            'price' => 'required|integer',
            'description' => 'required|string|min:20',
            'component_of_the_product' => 'required|string|min:5',
        ]);

        $path = Storage::url($validated['photo']->store('images','public'));

        Product::create([
            'photo'=>$path,
            'name'=>$validated['name'],
            'color'=>$validated['color'],
            'quantity_product'=>$validated['quantity_product'],
            'creator'=>$validated['creator'],
            'price'=>$validated['price'],
            'description'=>$validated['description'],
            'component_of_the_product'=>$validated['component_of_the_product'],
        ]);
    }

    public function updateProduct(Request $request, string $id)
    {
        $validated = $request->validate([
//            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'quantity_product' => 'required|integer',
            'creator' => 'required|string|max:255',
            'price' => 'required|integer',
            'description' => 'required|string|min:20',
            'component_of_the_product' => 'required|string|min:5',
        ]);

        Product::update([
            'photo'=>'photo',
            'name'=>$validated['name'],
            'color'=>$validated['color'],
            'quantity_product'=>$validated['quantity_product'],
            'creator'=>$validated['creator'],
            'price'=>$validated['price'],
            'description'=>$validated['description'],
            'component_of_the_product'=>$validated['component_of_the_product'],
        ]);

    }
}
