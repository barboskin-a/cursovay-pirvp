<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    //ФУНКЦИОНАЛ ОБНОВЛЕНИЯ ЛИЧНЫХ ДАННЫХ
    public function update(Request $request)
    {

        $validated = $request->validate([
            'name' => 'string|max:255',
            'phone' => 'string|max:11',
            'address' => 'string|max:255',
            'password' => 'string|min:6', //проверить поч null
        ]);

        $user = Auth::user()->update([
            'name' => $validated ['name'],
            'phone' => $validated ['phone'],
            'address' => $validated ['address'],
            'password' => Hash::make($validated ['password']), //разобраться с hash
        ]);

        dd($user->name);

        $user->password2 = $request->input('confirm_password');

        return redirect()->route('account')->with('status', 'Данные успешно обновлены');
        return view('account.index', [
            'user' => $user,
            'registrationData' => $registrationData
        ]);
    }
}
