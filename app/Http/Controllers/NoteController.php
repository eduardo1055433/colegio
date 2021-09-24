<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class NoteController
 * @package App\Http\Controllers
 */
class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.notes.index')->only('index');
        $this->middleware('can:admin.notes.edit')->only('edit','update');
    }

    public function index()
    {
        $notes = DB::select('SELECT  notes.nota,users.name,courses.name as `curso`  ,notes.id FROM notes INNER JOIN users ON notes.id_user = users.id INNER JOIN courses ON courses.id_user = users.id AND notes.id_course = courses.id ;');

        return view('note.index', compact('notes'));
            //->with('i', (request()->input('page', 1) - 1) * $notes->perPage());
    }

    public function create()
    {
         
        $note = new Note();
        $courses =  Course::where('id_user',auth()->id())->get();
        $users =  User::all();

        return view('note.create', compact('note','courses','users'));
    }

    public function store(Request $request)
    {
        request()->validate(Note::$rules);
        
        $note = Note::create($request->all());

        return redirect()->route('admin.notes.index')
            ->with('success', 'Note created successfully.');
    }

    public function show($id)
    {
        $note = Note::find($id);

        return view('note.show', compact('note'));
    }

    public function edit($id)
    {
        $note = Note::find($id);
        $users =  User::all();
        $courses =  Course::where('id',$id)->get();
         
        return view('note.edit', compact('note','users','courses'));
    }

    public function update(Request $request, Note $note)
    {
        request()->validate(Note::$rules);

        $note->update($request->all());

        return redirect()->route('admin.notes.index')
            ->with('success', 'Note updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $note = Note::find($id)->delete();

        return redirect()->route('admin.notes.index')
            ->with('success', 'Note deleted successfully');
    }
}
