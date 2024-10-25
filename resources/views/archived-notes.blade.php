<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archive</title>
</head>
<body>
    <h1>Archive</h1>

    <form action="{{route('showAllNotes')}}" method="GET">
        <button type="submit">Back to Notes</button>
    </form>

    @foreach ($archivedNotes->where('archived', true) as $note)
    <div><b>{{$note->title ?? 'Untitled'}}</b></div>
    <div><i>{{$note->description}}</i></div>

    <form action="{{route('showNote', ['id' => $note->id])}}" method="GET" style="display:inline;">
        <button type="submit" class="btn-view"></button>
    </form>
    <form action="{{route('editNote', ['id' => $note->id])}}" method="GET" style="display:inline;">
        <button type="submit" class="btn-edit"></button>
    </form>
    <form action="{{route('deleteNote', ['id' => $note->id])}}" method="POST" style="display:inline"
    onsubmit="return confirm('Move to trash?')">
        @method('POST')
        @csrf
        <button type="submit" class="btn-delete"></button>
    </form>
    <hr>
    @endforeach

    
</body>
</html>