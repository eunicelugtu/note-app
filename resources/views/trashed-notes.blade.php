<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRASHBIN</title>
</head>
<body>
    <h1>Trashbin</h1>
    <form action="{{route('showAllNotes')}}" method="GET" style="display:inline;">
        <button type="submit" class="btn-view">Back To Notes</button>
    </form>
    
    @if ($trashedNotes->isEmpty())
        <p>Nothing in the trashbin.</p>

    @else
        @foreach ($trashedNotes as $note)
            <div><b>{{ $note->title ?? 'Untitled' }}</b></div>
            <div><i>{{ $note->description ?? 'no description' }}</i></div>
            <div>{{ $note->content ?? '' }}</>

            <form action="{{ route('restoreNote', ['id' => $note->id]) }}" method="POST">
                @method('POST')
                @csrf
                <button type="submit">Restore</button>
            </form>

            <form action="{{ route('forceDeleteNote', ['id' => $note->id]) }}" method="POST"
            onsubmit="return confirm('Are you sure you want to permanently delete this note?')">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
            <hr>
        @endforeach
    @endif
    
</body>
</html>