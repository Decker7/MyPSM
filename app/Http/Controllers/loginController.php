<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class loginController extends Controller
{
    public function register(Request $request)
    {
        return view('Manage-Login-and-Registration.ViewRegistration');
    }

    public function registerSave(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ])->validate();

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'Customer'
        ]);

        return redirect()->route('login');
    }

    public function login()
    {
        return view('Manage-Login-and-Registration.ViewLogin');
    }

    public function loginAction(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();

        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }

        $request->session()->regenerate();

        $user = Auth::user(); // Get the currently authenticated user

        if ($user->user_type === 'customer') {
            return redirect()->route('Home'); // Route for customers
        } elseif ($user->user_type === 'activity_owner') {
            return redirect()->route('Owner.Dashboard'); // Route for activity owners
        } elseif ($user->user_type === 'admin') {
            return redirect()->route('AdminDashboard.View'); // Route for admins
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login'); // Redirect to login or homepage after logout
    }

    public function profile()
    {
        return view('Manage-Profile.ViewProfile');
    }
}
