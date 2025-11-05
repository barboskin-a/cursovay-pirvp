<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Auth::user()->cartItems()->with('product')->get();
        $total = Auth::user()->cart_total;
        return view('cart.index', compact('cartItems', 'total'));
    }

    public function add(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->stock
        ]);

        if(!$product->isAvailable())
        {
            return back()->with(['error' => 'Товар недоступен']);
        }
// Проверяем достаточно ли товара на складе
        $requestedQuantity = $request->quantity;
        $existingQuantity = Auth::user()->cartItems()
            ->where('product_id', $product->id)
            ->value('quantity') ?? 0;

        if (($existingQuantity + $requestedQuantity) > $product->stock) {
            return back()->with('error', 'Недостаточно товара на складе');
        }

        try {
            Auth::user()->addToCart($product->id, $requestedQuantity);

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Товар добавлен в корзину',
                    'cart_count' => Auth::user()->cart_items_count
                ]);
            }

            return back()->with('success', 'Товар добавлен в корзину');

        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Ошибка при добавлении в корзину'
                ], 500);
            }

            return back()->with('error', 'Ошибка при добавлении в корзину');
        }
    }

    public function remove(CartItem $cartItem)
    {
        if ($cartItem->user_id !== Auth::id()) {
            abort(403);
        }

        $cartItem->delete();

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Товар удален из корзины',
                'cart_count' => Auth::user()->cart_items_count,
                'cart_total' => Auth::user()->cart_total
            ]);
        }

        return back()->with('success', 'Товар удален из корзины');
    }

    public function update(Request $request, CartItem $cartItem)
    {
        if ($cartItem->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $cartItem->product->stock
        ]);

        $cartItem->update([
            'quantity' => $request->quantity
        ]);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'item_total' => $cartItem->total_price,
                'cart_total' => Auth::user()->cart_total,
                'cart_count' => Auth::user()->cart_items_count
            ]);
        }

        return back()->with('success', 'Корзина обновлена');
    }

    public function clear()
    {
        Auth::user()->cartItems()->delete();

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Корзина очищена'
            ]);
        }

        return back()->with('success', 'Корзина очищена');
    }
}

