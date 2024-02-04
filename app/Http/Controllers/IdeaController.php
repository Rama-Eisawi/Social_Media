<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store()
    {
        //to create a new record
        //we can use create instead of new, and don't need to save it
        /* $idea= new Idea();
        $idea->content =  request()->get('idea','');
        $idea->save(); */

        $validated = request()->validate([
            'content' => 'required|min:3|max:240',
        ]);

        $validated['user_id'] = auth()->id(); //the current logged in user

        Idea::create($validated);
        return redirect()
            ->route('dashboard')
            ->with('success', 'Idea was created successfully!'); //we use the key success in if statement
    }

    public function show(Idea $idea)
    {
        return view('ideas.show', compact('idea')); //Create array containing variables and their values
        //instead of useing idea=>idea
    }
    public function edit(Idea $idea)
    {
        if (auth()->id() !== $idea->user_id) {
            abort('404');
        }
        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }
    public function update(Idea $idea)
    {
        if (auth()->id() !== $idea->user_id) {
            abort('404');
        }
        $validated = request()->validate([
            'content' => 'required|min:3|max:240',
        ]);
        //$idea->content = request()->get('content', '');
        //$idea->save();
        //we can use this instead of above to protect from request all
        $idea->update($validated);
        return redirect()
            ->route('ideas.show', $idea->id)
            ->with('success', 'Idea updated successfully!');
    }
    public function destroy(Idea $idea)
    {
        //Idea::where('id',$id)->firstOrfail()->delete();
        //Idea::destroy($id);
        if (auth()->id() !== $idea->user_id) {
            abort('404');
        }
        $idea->delete();
        return redirect()
            ->route('dashboard')
            ->with('success', 'Idea deleted successfully!'); //we use the key success in if statement
    }
}
