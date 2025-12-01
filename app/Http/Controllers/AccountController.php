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
//исправить update
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:13',
            'address' => 'nullable|string|max:255',
            'password' => 'sometimes|nullable|string|min:6',
        ]);

        if(isset($validated['password'])){
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        Auth::user()->update([
            'name' => $validated ['name'],
            'phone' => $validated ['phone'],
            'address' => $validated ['address'],
        ]);

        Auth::user()->update($validated);
//        return redirect()->route('account')->with('status', 'Данные успешно обновлены');
//        return view('account.index', [
//            'user' => $user,
//            'registrationData' => $registrationData
//        ]);
    }
}
