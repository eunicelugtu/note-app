<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://127.0.0.1:8000/css/app.css">
    <title>TRASHBIN</title>
</head>
<body>
    <div class="note-container">
        <form action="{{route('showAllNotes')}}" method="GET">
            <style>
                @import url('https://fonts.cdnfonts.com/css/lemon-tuesday');
            </style>
            <div class="logo-container">
                <button class="button-logo" data-text="Awesome">
                    <span class="actual-text">&nbsp;litera&nbsp;</span>
                    <span aria-hidden="true" class="front-text">&nbsp;litera&nbsp;</span>
                </button>
            </div>    
        </form>

        <h1><b>Trashbin</b></h1>
        <form action="{{route('showAllNotes')}}" method="GET" style="display:inline;">
            <button class="button-back">
                <svg class="svgIcon" viewBox="0 0 384 512"><path d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"></path></svg>
            </button>
        </form>
        <hr>
        
        @if ($trashedNotes->isEmpty())
            <p>Nothing in the trashbin.</p>

        @else
            @foreach ($trashedNotes as $note)
                <div><b>{{ $note->title ?? 'Untitled' }}</b></div>
                <div class="description">{{ $note->description ?? 'no description' }}</div>
                <div class="content">{{ $note->content ?? '' }}</>

                <form action="{{ route('restoreNote', ['id' => $note->id]) }}" method="POST" style="display:inline;">
                    @method('POST')
                    @csrf
                    <button type="submit" class="button-restore"><span class="shadow-restore"></span><span class="edge-restore"></span><div class="front-restore"><span>restore</span></div></button>
                </form>

                <form action="{{ route('forceDeleteNote', ['id' => $note->id]) }}" method="POST" style="display:inline;"
                onsubmit="return confirm('You sure you want to permanently delete this note?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete"></button>
                </form>
                <hr>
            @endforeach
        @endif
    </div>
    
</body>
</html>