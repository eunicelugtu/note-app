<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://127.0.0.1:8000/css/app.css">
    <title>Litera</title>
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
        <br>
        <form action="{{route('trashBin')}}" method="GET" class="trash-form">
            <button type="submit" class="button-trash">
                <span class="button__text">trashbin</span>
                <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="520" viewBox="0 0 512 512" height="512" class="svg"><title></title><path style="fill:none;stroke:#323232;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px" d="M112,112l20,320c.95,18.49,14.4,32,32,32H348c17.67,0,30.87-13.51,32-32l20-320"></path><line y2="112" y1="112" x2="432" x1="80" style="stroke:#323232;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px"></line><path style="fill:none;stroke:#323232;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px" d="M192,112V72h0a23.93,23.93,0,0,1,24-24h80a23.93,23.93,0,0,1,24,24h0v40"></path><line y2="400" y1="176" x2="256" x1="256" style="fill:none;stroke:#323232;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line><line y2="400" y1="176" x2="192" x1="184" style="fill:none;stroke:#323232;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line><line y2="400" y1="176" x2="320" x1="328" style="fill:none;stroke:#323232;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line></svg>
                </span>
            </button>
        </form>
        <form action="{{ route('searchNote') }}" method="GET">

            <div class="group">
                <svg class="icon" aria-hidden="true" viewBox="0 0 24 24">
                    <g>
                        <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path>
                    </g>
                </svg>
                <input placeholder="search" type="search" class="input">
            </div>
        </form>
        <form action="{{route('showAllFavorites')}}" method="GET">
            <button type="submit">Favorite</button>
        </form><br>
        <br>

        <form action="{{route('createNote')}}" method="GET">
            <button type="submit" class="button-trash">
                <span class="button__text">add note</span>
                <span class="button__icon"><svg class="fill-white" viewBox="0 0 0.6 0.6" height="20" width="20"><path d="M.325.275H.55v.05H.325V.55h-.05V.325H.05v-.05h.225V.05h.05z" fill-rule="evenodd"></path></svg></span>
            </button>
        </form>

        <ul class="note-list">
                <li>
                    <div class="note-grid">
                    <div class="note-card">

                    @foreach ($notes->where('pinned', true) as $note)
                        <div class="note pinned">
                        <div><b>{{ $note->title ?? 'Untitled' }}</b></div>
                        <div class="description">{{ $note->description ?? 'no description' }}</div>

                        <div>Pinned</div>

                        <form action="{{ route('pinnedNote', ['id' => $note->id]) }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <button type="submit">
                                {{ $note->pinned ? 'Unpin' : 'Pin' }}
                            </button>
                        </form>
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

                    @foreach ($notes->where('pinned', false) as $note)
                        <div class="note pinned">
                        <div><b>{{ $note->title ?? 'Untitled' }}</b></div>
                        <div class="description">{{ $note->description ?? 'no description' }}</div>

                        <form action="{{ route('pinnedNote', ['id' => $note->id]) }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <button type="submit">
                                {{ $note->pinned ? 'Unpin' : 'Pin' }}
                            </button>
                        </form>
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
                        
                    @endforeach

                </li>
                <hr>
        </ul>
    </div>
</body>
</html>