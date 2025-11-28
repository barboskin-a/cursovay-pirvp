<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Profiler\Profile;
use Illuminate\Pagination\Paginator; //новое

class UserController extends Controller
{
    public $password2;

    //ФУНКЦИОНАЛ РЕГИСТРАЦИИ

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
        return redirect('/registration')->with('success', 'Success registrstion'); //перенаправление на страницу регистрации, если регистрации НЕ успешна
    }

    //ФУНКЦИОНАЛ АВТОРИЗАЦИИ

    public function login(Request $request){
        $validated = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        if (Auth::attempt(credentials: $request->only('email', 'password'))){
            return redirect('/')->with('success', 'Success login');
        }

        if(!Auth::attempt($request->only('email', 'password'))){
            return back()->withErrors([
                'email' => 'Неверный логин или пароль'
            ])
                ->withInput($request->only('email'));
        }
        return redirect('/');


    }

    //ФУНКЦИОНАЛ ВЫХОДА ИЗ АККАУНТА

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

//ФУНКЦИОНАЛ УДАЛЕНИЯ АККАУНТА

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
}