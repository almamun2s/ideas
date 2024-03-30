<?php

namespace App\Http\Controllers\Admin;

use App\Models\Idea;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalIdeas = Idea::count();
        $totalComments = Comment::count();

        // if (!Gate::allows('admin')) {
        //     abort(401);
        // }
        // $this->authorize('admin');
        return view(
            'admin.dashboard',
            compact(['totalUsers', 'totalIdeas', 'totalComments'])
        );
    }
}
