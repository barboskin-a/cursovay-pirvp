<?php

namespace App\Http\Controllers;

use App\Models\User_shopping_cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use function PHPUnit\Framework\isEmpty;

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

        $query = Product::query();

        if($request->has('price_sort')){
            switch ($request->price_sort) {
                case 'high_to_low':
                    $query->orderBy('price', 'desc');
                    break;
                    case 'low_to_high':
                        $query->orderBy('price', 'asc');
                        break;
            }
        }else{
            $query->orderBy('id', 'desc');
        }
        return view('catalog', ['products' => $query->get()]);
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
//сделать флаг, чтобы при повторном нажатии на кнопку избранного товар удалялся из корзины(?)

//ДОБАВИТЬ ПЕРЕХОД НА КОНСТРУКТОР
    public function add_to_favourites($id)
    {
//        $favourites = User_shopping_cart::create([
//            'id_user' => Auth::user()->id,
//            'id_product' => $id,
//            'quantity_product' => 1,
//            'amount_to_pay' => Product::where('id', $id)->firstorfail()->price,
//        ]);
//        if($favourites->id_product == $id){
////            $favourites->id_product += 1;
//            $favourites->amount_to_pay = Product::where('id', $id)->firstorfail()->price;
//            $favourites->update();
//        }
//        else{
//            $favourites->delete();
////            $deleteFav = User_shopping_cart::where('id_user', Auth::user()->id)->where('id_product', $id)->firstorfail();
////            if($deleteFav){
////                $deleteFav->delete();
////            }
//        }

// ДОБАВЛЕНИЕ В КОРЗИНУ
        $userCart = User_shopping_cart::where('id_user', Auth::user()->id)->get();

        if ($userCart->isEmpty()) {
            User_shopping_cart::create([
                'id_user' => Auth::user()->id,
                'id_product' => $id,
                'quantity_product' => 1,
                'amount_to_pay' => Product::where('id', $id)->firstorfail()->price,
            ]);
        } else {
            $favourite = $userCart->where('id_product', $id)->first();
            if ($favourite) {
                $favourite->delete();
            } else {
                User_shopping_cart::create([
                    'id_user' => Auth::user()->id,
                    'id_product' => $id,
                    'quantity_product' => 1,
                    'amount_to_pay' => Product::where('id', $id)->firstorfail()->price,
                ]);
            }
        }

        return redirect()->back();
    }

    public function view_favourites()
    {
        $user_shopping_carts = User_shopping_cart::all();
        return view('favourites', ['user_shopping_carts' => $user_shopping_carts]);
    }

//    public function calc()
//    {
//        $cost = 0;
//        $products = 'id';
//        foreach ($products as $product) {
//            $cost += $product->price;
//        }
//    }

}