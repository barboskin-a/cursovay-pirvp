<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public $password2;

    //функционал регистрации

    public function registration(Request $request)
    {

        $user = new User();
        $user->email=$request->input('email'); //в модели юзера поле имейл будет иметь то значение, которое получили из реквеста
        $user->password = $request->input('password');

        $password2 = $request->input('password2');
        if($user->password == $password2){
            $user->password = Hash::make($user->password);
            $user->save();

            Auth::login($user);

            return redirect('/index'); //перенаправление на страницу авторизации, если регистрация успешна
        }
        return redirect('/registration'); //перенаправление на страницу регистрации, если регистрации НЕ успешна
    }

    public function login(Request $request){
        if (Auth::attempt(credentials: $request->only('email', 'password'))){
            return redirect('/index');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function index(){
        $user = User::latest()->paginate(10);
        return view('admin.user.index', compact('user'));
    }
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }


}