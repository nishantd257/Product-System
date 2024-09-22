<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'language' => 'required|array',
            'profile_description' => 'nullable|string|max:1500',
            'profile_photo' => 'nullable|image|max:2048',
        ]);
    
        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profiles', 'public');
        }
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'language' => json_encode($request->language),
            'profile_description' => $request->profile_description,
            'profile_photo' => $path ?? null,
            'password' => Hash::make($request->password),
        ]);
    
        event(new Registered($user));
    
            Auth::login($user);
    
            return redirect(route('dashboard', absolute: false));
    }
    
}

