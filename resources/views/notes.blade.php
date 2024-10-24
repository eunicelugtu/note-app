<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://127.0.0.1:8000/css/app.css">
    <title>Notes App</title>
</head>
<body>
    <h1>Notes</h1>

        <form action="{{ route('searchNote') }}" method="GET">
            <input type="text" class="search-box" name="query" placeholder="Search...">
            <button type="submit">Search</button>
        </form><br>

        <form action="{{route('trashBin')}}" method="GET">
            <button type="submit">Trashbin</button>
        </form>

        <form action="{{route('createNote')}}" method="GET">
            <button type="submit" class="btn-create">Add Note</button>
        </form>
        <br>
        <ul class="note-list">
            @foreach ($notes as $note)
                <li>
                    <div class="note-grid">
                    <div class="note-card">
                        <div><b>{{ $note->title ?? 'Untitled' }}</b></div>
                        <div><i>{{ $note->description ?? 'no description' }}</i></div>

                        <br>
                        <form action="{{route('showNote', ['id' => $note->id])}}" method="GET" style="display:inline;">
                            <button type="submit" class="btn-view">View</button>
                        </form>
                        <form action="{{route('editNote', ['id' => $note->id])}}" method="GET" style="display:inline;">
                            <button type="submit" class="btn-edit">Edit</button>
                        </form>
                        <form action="{{route('deleteNote', ['id' => $note->id])}}" method="POST" style="display:inline"
                        onsubmit="return confirm('Are you sure you want to move this note to trash?')">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn-delete">Delete</button>
                        </form>
                </li>
                <hr>
            @endforeach
        </ul>
    </div>
</body>
</html>