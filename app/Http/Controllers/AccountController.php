<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = Validator::make($request-> all(), [
            'name' => 'nullable|string|max:255|unique:user, name',
            'phone' => 'nullable|string|max:11|unique:user, phone_number,' .$user->id,
            'address' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:8|confirmed', //проверить поч null
        ]);

        if($validated){
            $user->name = $request->input('name');
            $user->phone = $request->input('phone');
            $user->adress = $request->input('adress');
            $user->password = $request->input('password');
        }

//        $user->password2 = $request->input('confirm_password');



        $user->update();

//        return redirect()->route('account')->with('status', 'Данные успешно обновлены');
//        return view('account.index', [
//            'user' => $user,
//            'registrationData' => $registrationData
//        ]);
    }

    public function showDeleteForm()
    {
        return view('account.delete');
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'password' => ['requires', 'current_password'],
        ]);

        $user = $request->user();
        Auth::logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('status', 'Ваш профиль был успешно удален');
    }
}
