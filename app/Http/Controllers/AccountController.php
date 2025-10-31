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

        $validator = Validator::make($request-> all(), [
            'name' => 'nullable|string|max:255|unique:user, name',
            'email' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:11|unique:user, phone_number,' .$user->id,
//            'address' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'password2' => 'nullable|string|min:8|same:password',
    ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
//            'address' => $request->input('address'),
            'password' => $request->input('password'),
            'password2' => $request->input('password2'),
        ]);
        return redirect()->route('account')->with('status', 'Данные успешно обновлены');
    }

}
