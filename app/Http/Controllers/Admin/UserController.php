<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {

        $users = User::latest()->paginate(4);

        return view('admin.users', compact('users'));
    }
}
