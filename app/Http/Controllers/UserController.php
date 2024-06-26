<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
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
    public function store(CreateUserRequest $request)
    {
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
        // This is for mailing and it works.
        // Mail::to($user->email)->send(new WelcomeMail($user));

        return redirect()->route('dashboard')->with('success', 'Account created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $profile)
    {
        $ideas = $profile->idea()->paginate(2);
        $ideasToCountLikes = $profile->idea;
        $totalLikes = 0;
        if (count($ideasToCountLikes) > 0) {
            foreach ($ideasToCountLikes as $idea ) {
                $totalLikes = $totalLikes + $idea->likes_count;
            }
        }
        return view('profile.show', compact('profile', 'ideas', 'totalLikes' ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $profile)
    {
        // Authorized by policy 
        $this->authorize('update', $profile);
        $editing = true;
        return view('profile.show', compact('profile', 'editing'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $profile)
    {
        // Authorized by policy 
        $this->authorize('update', $profile);

        // $validated = request()->validate([
        //     'name' => 'required|min:3|max:30',
        //     'bio' => 'required|min:10|max:255',
        //     'image' => 'image'
        // ]);
        $validated = $request->validated();

        if ($request->has('image')) {
            $imagePath = $request->file('image')->store('profile', 'public');
            $validated['image'] = $imagePath;

            // Storage::disk('public')->delete($profile->image ?? '');

            if (!is_null($profile->image)) {
                if (Storage::disk('public')->exists($profile->image)) {
                    Storage::disk('public')->delete($profile->image);
                }
            }
        }
        $profile->update($validated);
        return redirect()->route('profile');
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

    public function profile()
    {
        return $this->show(auth()->user());
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
