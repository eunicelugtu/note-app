<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\Storage;

class NoteController extends Controller
{
    public function showAllNotes()
    {
        $notes = Note::where('archived', false)->get();
        $notes = Note::orderBy('pinned', 'desc')->get();
        $notes = Note::orderBy('updated_at', 'desc')->get();

        return view('notes', ['notes' => $notes]);
    }

    public function createNote()
    {
        return view('create-note');
    }

    public function saveNote(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:50',
            'description' => 'nullable|string|max:100',
            'content' => 'nullable|string|max:1000',
            'pinned' => 'nullable|boolean',
            'favorite' => 'nullable|string|max:10'
        ]);

        $note = new Note();
        $note->title = $validated['title'];
        $note->description = $validated['description'];
        $note->content = $validated['content'];
        $note->pinned = $validated['pinned'];
        $note->favorite = $validated['favorite'];
        $note->save();

        return redirect()->route('showAllNotes')->with('success', 'Note created successfully.');
    }

    public function showNote(Request $request)
    {
        $note = Note::find($request->id);

        if (!$note)
        {
            return redirect()->route('showAllNotes')->with('error', 'Note not found.');
        }

        return view('note', ['note' => $note]);
    }

    public function editNote(Request $request)
    {
        $note = Note::find($request->id);

        if (!$note)
        {
            return redirect()->route('showAllNotes')->with('error', 'Note not found.');
        }

        return view('edit-note', ['note' => $note]);
    }

    public function updateNote(Request $request, Note $note)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:50',
            'description' => 'nullable|string|max:100',
            'content' => 'nullable|string|max:1000',
            'pinned' => 'nullable|boolean',
            'favorite' => 'nullable|string|max:10',
        ]);

        $note = Note::find($request->id);
        $note->title = $validated['title'];
        $note->description = $validated['description'];
        $note->content = $validated['content'];
        $note->pinned = $validated['pinned'];
        $note->favorite = $validated['favorite'];
        $note->save();

        return redirect()->route('showNote', ['id' => $note->id])->with('success', 'Note updated successfully.');
    }

    public function deleteNote(Request $request)
    {
        $note = Note::find($request->id);

        if ($note)
        {
            $note->delete();
        }

        return redirect()->route('showAllNotes')->with('success', 'Note moved to trash.');
    }

    public function trashBin()
    {
        $trashedNotes = Note::onlyTrashed()->get();
        return view('trashed-notes', compact('trashedNotes'));
    }

    public function restoreNote(Request $request)
    {
        $note = Note::onlyTrashed()->find($request->id);
        $note->restore();
        return redirect()->route('showNote', ['id' => $note->id])->with('status', 'Note restored successfully.');
    }

    public function forceDeleteNote(Request $request)
    {
        $note = Note::onlyTrashed()->find($request->id);
        $note->forceDelete();
        return redirect()->route('trashBin')->with('status', 'Note permanently deleted.');
    }

    public function searchNote(Request $request)
    {
        $query = $request->input('query');

        $results = Note::where('title', 'LIKE', "%{$query}%")
                        ->orWhere('description', 'LIKE', "%{$query}%")
                        ->orWhere('content', 'LIKE', "%{$query}%")
                        ->get();

        return view('search-results', ['results' => $results]);
    }

    public function pinnedNote(Request $request)
    {
        $note = Note::find($request->id);
        $note->pinned = !$note->pinned;
        $note->save();

        return redirect()->route('showAllNotes')->with('status', 'Note is pinned.');
    }

    public function favoriteNote(Request $request)
    {
        $note = Note::find($request->id);
        $note->favorite = !$note->favorite;
        $note->save();

        return redirect()->route('showNote', ['id' => $note->id])->with('status', 'Note is added to favorites.');
    }

    public function showAllFavorites()
    {
        $favoriteNotes = Note::orderBy('favorite', 'desc')->get();
        return view('favorite-notes', ['favoriteNotes' => $favoriteNotes]);
    }

    public function archiveNote(Note $note)
    {
        $note->archived = !$note->archived;
        $note->save();

        return redirect()->route('showAllNotes')->with('status', 'Note is archived.');
    }

    public function showArchive()
    {
        $archivedNotes = Note::orderBy('archive', 'desc')->get();
        return view('archived-notes', ['archivedNotes' => $archivedNotes]);
    }
}
