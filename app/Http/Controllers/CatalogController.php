<?php

namespace App\Http\Controllers;

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
}