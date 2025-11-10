<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Profiler\Profile;

class UserController extends Controller
{
    public $password2;

    //функционал регистрации

    public function registration(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|min:10|max:255',
            'password' => 'required|string|min:6|regex:/[a-zA-Z]/|regex:/[0-9]/',
            'password2' => 'required|min:6|regex:/[a-zA-Z]/|regex:/[0-9]/',
        ]);

//        $user = new User();
//        $user->name=$request->input('name');
//        $user->email=$request->input('email'); //в модели юзера поле имейл будет иметь то значение, которое получили из реквеста
//        $user->password = $request->input('password');

        $user = User::create ([
            'email' => $validated ['email'],
            'password' => $validated ['password'],
            'password2' => $validated ['password2'],
        ]);

        $password2 = $request->input('password2');
        if($user->password == $password2){
            $user->password = Hash::make($user->password);
            $user->save();

            Auth::login($user);

            return redirect('/')->with('success', 'Регистрация прошла успешно')->with('user_data', $validated); //перенаправление на страницу авторизации, если регистрация успешна
        }
        return redirect('/registration'); //перенаправление на страницу регистрации, если регистрации НЕ успешна
    }

    //авторизация

    public function login(Request $request){
        $validated = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        if (Auth::attempt(credentials: $request->only('email', 'password'))){
            return redirect('/');
        }

        if(!Auth::attempt($request->only('email', 'password'))){
            return back()->withErrors([
                'email' => 'Неверный логин или пароль'
            ])
                ->withInput($request->only('email'));
        }
        return redirect('/');


    }

    //выход

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

//удаление аккаунта

    public function showDelete()
    {
        return view('account.delete');
    }
    public function destroy(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Вы не авторизованы.');
        }

        // Сохраняем email для вывода, если нужно
        $email = $user->email;

        // Разлогиниваем
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $user->delete();

        return redirect()
            ->route('index')
            ->with('success', "Аккаунт $email был успешно удалён.");
    }


    //Добавление товаров в корзину


    public function cartItem()
    {
        return $this->hasMany(CartItem::class);
    }
    public function addToCart($productId, $quantity = 1)
    {
        $existingItem = $this->cartItem()->where('product_id', $productId)->first();
        if ($existingItem) {
            $existingItem->incrementQuantity($quantity);
            return $this->cartItem()->create(['product_id' => $productId, 'quantity' => $quantity]);
        }
    }

    public function getCartTotalAttribute()
    {
        return $this->cartItem()->sum(function ($item) {
            return $item->total_price;
        });
    }

    public function getCartItemsCountAttribute()
    {
     return $this->cartItem()->sum('quantity');
    }
//
//
//// Показываем форму редактирования профиля
//    public function edit()
//    {
//        $user = Auth::user();
//        return view('account.edit', compact('user'));
//    }
//
//// Сохраняем изменения
//    public function update(Request $request)
//    {
//        $user = Auth::user();
//
//        $validated = $request->validate([
//            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
//            'password' => 'nullable|string|min:6|confirmed',
//        ]);
//
//        $user->email = $validated['email'];
//
//        if (!empty($validated['password'])) {
//            $user->password = Hash::make($validated['password']);
//        }
//
//        $user->save();
//
//        return redirect()->route('account.edit')->with('success', 'Профиль успешно обновлён.');
//    }
//
}