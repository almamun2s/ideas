<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $idea = Idea::orderBy('id', 'desc');

        if (request()->has('search')) {
            $idea = $idea->where('content', 'like', '%' . request()->get('search', '') .'%' );
        }

        return view('dashboard', [
            // 'ideas' => Idea::orderBy('id', 'desc')->get(),
            'ideas' => $idea->paginate(2),
        ]);
    }
}
