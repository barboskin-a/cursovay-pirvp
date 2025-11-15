<?php

namespace App\Http\Controllers;

use App\Models\User_shopping_cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('catalog', [
            'products' => Product::all(),
        ]);
    }

    public function product_card($id)
    {
        $product = Product::query()->findOrFail($id);

        return view('/product_card', ['product' => $product]);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'color' => 'required',
            'quantity_product' => '',
            'creator' => '',
            'price' => 'required',
            'description' => '',
            'component_of_the_product' => '',

        ]);
        $product = Product::where('id', $id)->firstorfail();
        $oldName = 'images/products/'.$product->name.'.png';
        $product->update([
            'name' => $validated['name'],

            'color' => $validated['color'],
            'quantity_product' => $validated['quantity_product'],
            'creator' => $validated['creator'],
            'price' => $validated['price'],
            'description' => $validated['description'],
            'component_of_the_product' => $validated['component_of_the_product'],
        ]);
        $product->save();
        $newName = 'images/products/'.$validated['name'].'.png';
        File::move($oldName, $newName);
        return redirect('/catalog-admin')->with('success', 'Товар изменен');

    }

    //проверка существует ли фейворитс, если да, то обновляем, если нет то создаем

    public function add_to_favourites($id)
    {
        $favourites = User_shopping_cart::create([
            'id_user' => Auth::user()->id,
            'id_product' => $id,
            'quantity_product' => 1,
            'amount_to_pay' => Product::where('id', $id)->firstorfail()->price,
        ]);

        if($favourites->id_product == $id){
            $favourites->id_product += 1;
            $favourites->amount_to_pay += Product::where('id', $id)->firstorfail()->price;
            $favourites->update();
        }

        return redirect()->back();
    }
}