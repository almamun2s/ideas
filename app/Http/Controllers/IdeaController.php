<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIdeaRequest;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    /**
     * Show single Idea
     *
     * @param Idea $idea
     */
    public function show(Idea $idea)
    {
        // return view('ideas.show', [
        //     'idea'  => $idea
        // ]);
        return view('ideas.show', compact('idea'));
    }


    /**
     * Creating Ideas in database
     *
     */
    public function store(CreateIdeaRequest $request )
    {
        $validate = $request->validated();
        $validate['user_id'] = auth()->id();

        Idea::create($validate);

        return redirect()->route('dashboard')->with('success', 'Idea created Successfully!');
    }

    /**
     * Delete Idea from Database
     *
     * @param Idea $idea
     */
    public function destroy(Idea $idea)
    {
        // //  Check user Manually
        // if (auth()->id() !== $idea->user_id ) {
        //     abort(401);
        // }
        // Check user by Gate
        // $this->authorize('idea.delete', $idea);

        // Check user by Policy 
        $this->authorize('delete', $idea );

        $idea->delete();

        return redirect()->route('dashboard')->with('success', 'Idea Deleted Successfully!');
    }
    /**
     * Show single Idea
     *
     * @param Idea $idea
     */
    public function edit(Idea $idea)
    {
        // //  Check user Manually
        // if (auth()->id() !== $idea->user_id ) {
        //     abort(401);
        // }
        // Check user by Gate
        // $this->authorize('idea.edit', $idea);

        // Check user by Policy 
        $this->authorize('update', $idea );

        return view('ideas.show', [
            'idea' => $idea,
            'editing' => true
        ]);
    }

    /**
     * Update Idea in database
     *
     * @param Idea $idea
     */
    public function update(CreateIdeaRequest $request ,  Idea $idea)
    {
        // //  Check user Manually
        // if (auth()->id() !== $idea->user_id ) {
        //     abort(401);
        // }
        // Check user by Gate
        // $this->authorize('idea.edit', $idea);

        // Check user by Policy 
        $this->authorize('update', $idea);

        $validate = $request->validated();
        $idea->update($validate);

        return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea updated Successfully!');
    }
}
