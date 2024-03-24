<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    /**
     * Show single Idea
     *
     * @param Idea $idea
     */
    public function show(Idea $idea){
        // return view('ideas.show', [
        //     'idea'  => $idea
        // ]);
        return view('ideas.show', compact('idea'));
    }

    /**
     * Creating Ideas in database
     *
     */
    public function store()
    {
        request()->validate([
            'idea'  => 'required|min:5|max:255'
        ]);
        $idea = Idea::create([
            'content' => request()->get('idea')
        ]);
        $idea->save();

        return redirect()->route('dashboard')->with('success', 'Idea created Successfully!');
    }

    /**
     * Delete Idea from Database
     *
     * @param Idea $idea
     */
    public function destroy(Idea $idea){
        $idea->delete();

        return redirect()->route('dashboard')->with('success', 'Idea Deleted Successfully!');
    }
}
