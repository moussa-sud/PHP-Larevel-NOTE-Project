<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()


    {
        $notes = Notes::query()->orderBy('Created_at', 'desc')->get();

        // this method which dumps all the data from the data base 
        // dd($notes); 
        
        return view('note.index', ['notes'=> $notes]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('note.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $incomingFields = $request->validate([
            'note' => 'required|string|max:255'
        ]);
        

        Notes::create($incomingFields); 

        return redirect('/note')->with('success', 'Comment stored successfully!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function show(Notes $note)
    {
        // dd($note); // Debug to check if the correct note object is retrieved

        return view('note.show', ['note' => $note]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function edit(Notes $note)
    {
        return view('note.edit', ['note' => $note]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notes $note)
    {
        $request -> validate([
            'note' => 'required|string|max:250',
        ]);

        $note ->update(
            [
                'note'=>$request->note, 
            ]
            );
        return redirect()->route('note.index')->with('success', 'Note updated successfully!'); 
    }   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notes $note)

    {
        // dd($note);
        $note->delete();

        return redirect()->route('note.index')->with('success', 'Note deleted successfully.');
    }
}
