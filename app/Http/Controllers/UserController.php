<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

            return redirect('/index'); //перенаправление на страницу авторизации, если регистрация успешна
        }
        return redirect('/registration'); //перенаправление на страницу регистрации, если регистрации НЕ успешна
    }

    public function login(Request $request){
        $validated = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        if (Auth::attempt(credentials: $request->only('email', 'password'))){
            return redirect('/index');
        }

        if(!Auth::attempt($request->only('email', 'password'))){
            return back()->withErrors([
                'email' => 'Неверный логин или пароль'
            ])
                ->withInput($request->only('email'));
        }
        return redirect('/index');


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