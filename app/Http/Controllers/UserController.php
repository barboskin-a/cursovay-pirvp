<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
            return redirect('/login'); //перенаправление на страницу авторизации, если регистрация успешна
        }
        return redirect('/registration'); //перенаправление на страницу регистрации, если регистрации НЕ успешна
    }

    //функционал авторизации

    public function login(Request $request){
        $user = User::where('email',$request->input('email'))->first();
        return redirect('/index');
    }

//    public function logout()
//    {
//        $user = User::where('login', $request->input('login'))->first();
//        return redirect('/index');
//    }


}