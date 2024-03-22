<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $idea = new Idea([
            'content' => 'Test from idea'
        ]);
        // dd(Idea::all());
        // $idea->content = "Test idea";
        // $idea->save();
        return view('dashboard', [
            'ideas' => Idea::all()
        ]);
    }
}
