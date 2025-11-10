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
        $registrationData = session('user_data', []);
        return view('account.index', [
            'user' => $user,
            'registrationData' => $registrationData
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = Validator::make($request-> all(), [
            'name' => 'nullable|string|max:255|unique:user, name',
            'email' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:11|unique:user, phone_number,' .$user->id,
//            'address' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'password2' => 'nullable|string|min:8|same:password',
        ]);
//        if ($validator->fails()) {
//            return redirect()->back()
//                ->withErrors($validator)
//                ->withInput();
//        }

        $user->update($validated);
        return redirect()->route('account')->with('status', 'Данные успешно обновлены');
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
