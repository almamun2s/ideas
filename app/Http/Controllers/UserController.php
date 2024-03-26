<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // abort(404);
    }
    /**
     * Showing user registration page
     *
     */
    public function register()
    {
        return view('user.register');
    }

    /**
     * Storing user data to db
     *
     */
    public function store()
    {
        $validated = request()->validate([
            'name' => 'required|min:3|max:30',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('dashboard')->with('success', 'Account created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $profile)
    {
        $ideas = $profile->idea()->paginate(2);
        return view('profile.show', compact('profile', 'ideas' ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $profile)
    {
        if (Auth::user()->id !== $profile->id) {
            abort(401);
        }
        $editing = true;
        return view('profile.show', compact('profile', 'editing'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        //
    }

    /**
     * Showing User Login page
     */
    public function login()
    {
        return view('user.login');
    }

    /**
     * Authenticating the user
     */
    public function authenticate()
    {
        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($validated)) {
            request()->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Logged in Successfully!');
        }
        return redirect()->back()->withErrors(['email' => 'Email or password did not match.']);
    }

    /**
     * User Logout
     */
    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerate();

        return redirect()->route('login');
    }
}
