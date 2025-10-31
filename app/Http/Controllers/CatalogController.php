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
            'brands' => Brand::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validated = $request->validate([

            'full_name' => 'required',

            'shortName' => 'required',

            'price' => 'required',

            'type' => 'required',

            'brand' => 'required',
            'status' => '',
            'photo' => 'required|mimes:png',
            'max_value' => 'required',

        ]);



        // Create the user

        $product = Product::create([

            'full_name' => $validated['full_name'],

            'shortName' => $validated['shortName'],
            'price' => $validated['price'],
            'type' => $validated['type'],
            'brand' => $validated['brand'],
            'status' => $validated['status'],
            'max_value' => $validated['max_value'],

        ]);
        $file = $request->file('photo');
        $extension = $file->getClientOriginalExtension();

        $filename = $request->shortName.'.'.$extension;

        $path = 'images/products/';
        $file->move($path, $filename);
        return redirect('/catalog-add')->with('success', 'Товар добавлен');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([

            'full_name' => 'required',

            'shortName' => 'required',

            'price' => 'required',

            'type' => 'required',

            'brand' => 'required',
            'status' => '',
            'max_value' => 'required',

        ]);
        $product = Product::where('id', $id)->firstorfail();
        $oldName = 'images/products/'.$product->shortName.'.png';
        $product->update([
            'full_name' => $validated['full_name'],

            'shortName' => $validated['shortName'],
            'price' => $validated['price'],
            'type' => $validated['type'],
            'brand' => $validated['brand'],
            'status' => $validated['status'],
            'max_value' => $validated['max_value'],
        ]);
        $product->save();
        $newName = 'images/products/'.$validated['shortName'].'.png';
        File::move($oldName, $newName);
        return redirect('/catalog-admin')->with('success', 'Товар изменен');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::where('id', $id)->firstorfail();
        $filename = 'images/products/'.$product->shortName.'.png';
        $product->delete();
        File::delete($filename);
        echo ("Товар удален");
        return redirect()->route('catalog-admin');
    }

    public function admin()
    {
        return view('catalog-admin', [
            'products' => Product::all(),
            'brands' => Brand::all()
        ]);
    }
}