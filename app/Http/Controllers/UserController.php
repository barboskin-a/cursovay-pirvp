<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $user = new User();
        $user->email=$request->input('email'); //в модели юзера поле имейл будет иметь то значение, которое получили из реквеста
        $user->password=$request->input('password');
        $user->returnPassword=$request->input('returnPassword');
    }
}
