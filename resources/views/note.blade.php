<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://127.0.0.1:8000/css/app.css">
    <title>Notes App</title>
</head>
<body>
    <div class="note-container">

        <div><h2>{{ $note->title ?? 'Untitled' }}</h2></div>
        <div><i>{{ $note->description ?? 'no description' }}</i></div><br>
        <div>{{$note->content ?? ''}}</div>
        <div id="container">
            @if($note->image)
                    <img src="{{ asset('storage/' . $note->image) }}" alt="Note Image" style="max-width: 300px;">
            @endif
        </div>
        <div><p><strong>Last Updated:</strong> {{ $note->updated_at->diffForHumans() }}</p></div>

        <br>
        <form action="{{route('editNote', ['id' => $note->id])}}" method="GET" style="display:inline">
            <button type="submit" class="btn-edit">Edit</button>
        </form>
        <form action="{{route('deleteNote', ['id' => $note->id])}}" method="POST" style="display:inline"
        onsubmit="return confirm('Are you sure you want to move this note to trash?')">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn-delete">Delete</button>
        </form>

        <form action="{{route('showAllNotes')}}" method="GET" style="display:inline;">
            <button type="submit" class="btn-view">Back to Notes</button>
        </form> 
    </div>
</body>
</html>