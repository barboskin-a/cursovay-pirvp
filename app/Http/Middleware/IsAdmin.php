<?php

namespace App\Http\Middleware;

use App\Models\Product;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
// Если пользователь не админ — редиректим на главную с ошибкой
        if (!Auth::check() || Auth::user()->role !== '1') {
            return redirect()->route('index')->with('error', 'У вас нет прав для доступа в админ-панель.');
        }
        return $next($request);
    }

//    public function add_product(Request $request)
//    {
//        $validated = $request->validate([
//            'email' => 'required|email|min:10|max:255',
//            'password' => 'required|string|min:6|regex:/[a-zA-Z]/|regex:/[0-9]/',
//            'password2' => 'required|min:6|regex:/[a-zA-Z]/|regex:/[0-9]/',
//        ]);
//
////        $user = new User();
////        $user->name=$request->input('name');
////        $user->email=$request->input('email'); //в модели юзера поле имейл будет иметь то значение, которое получили из реквеста
////        $user->password = $request->input('password');
//
//        $product = Product::create ([
//            'email' => $validated ['email'],
//            'password' => $validated ['password'],
//            'password2' => $validated ['password2'],
//        ]);
//
//            Auth::login($user);
//
//            return redirect('/')->with('success', 'Регистрация прошла успешно')->with('user_data', $validated); //перенаправление на страницу авторизации, если регистрация успешна
//        }
//        return redirect('/registration')->with('success', 'Success registrstion'); //перенаправление на страницу регистрации, если регистрации НЕ успешна
//    }

    public function productDelete()
    {
        return view('product.delete');
    }
    public function destroyProduct(Request $request)
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

}