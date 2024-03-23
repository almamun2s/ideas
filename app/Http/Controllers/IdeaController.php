<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
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
     * @param int $id
     */
    public function destroy(int $id){
        Idea::where('id', $id )->firstOrFail()->delete();
        
        return redirect()->route('dashboard')->with('success', 'Idea Deleted Successfully!');
    }
}
