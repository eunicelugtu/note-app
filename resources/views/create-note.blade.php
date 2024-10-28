<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://127.0.0.1:8000/css/app.css">
    <link rel="icon" href="{{ asset('images/Litera.png') }}" type="image/png">

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

    <div class="button-container">
        <form action="{{ route('searchNote') }}" method="GET">
            <div class="group">
                <svg class="icon" aria-hidden="true" viewBox="0 0 24 24">
                    <g>
                        <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path>
                    </g>
                </svg>
                <input placeholder="search" type="search" name="query" class="input">
            </div>
        </form>
        <form action="{{route('showAllNotes')}}" method="GET" style="display:inline;">
            <button class="button-menu">
                <span><svg width="20" height="20" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg"><path d="M27.9167 30H20.4167C19.2658 30 18.3333 29.1392 18.3333 28.0769V21.1538C18.3333 20.3038 17.5875 19.6154 16.6667 19.6154H13.3333C12.4125 19.6154 11.6667 20.3038 11.6667 21.1538V28.0769C11.6667 29.1392 10.7342 30 9.58333 30H2.08333C0.9325 30 0 29.1392 0 28.0769V13.3946C0 11.6262 0.878334 9.95539 2.3825 8.86154L14.2258 0.246923C14.68 -0.0823077 15.32 -0.0823077 15.7733 0.246923L27.6183 8.86154C29.1225 9.95539 30 11.6254 30 13.3931V28.0769C30 29.1392 29.0675 30 27.9167 30Z" fill="black"></path></svg></span>         
            </button>
        </form>
        <form action="{{route('showAllFavorites')}}" method="GET" style="display:inline;">
            <button class="button-menu" type="submit">
                <span><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="black" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></span>
            </button>
        </form>
        <form action="{{route('showArchive')}}" method="GET" style="display:inline;">
            <button class="Btn">
              <div class="svgWrapper"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 42 42" class="svgIcon-a"><path stroke-width="5"stroke="#000000" d="M9.14073 2.5H32.8593C33.3608 2.5 33.8291 2.75065 34.1073 3.16795L39.0801 10.6271C39.3539 11.0378 39.5 11.5203 39.5 12.0139V21V37C39.5 38.3807 38.3807 39.5 37 39.5H5C3.61929 39.5 2.5 38.3807 2.5 37V21V12.0139C2.5 11.5203 2.6461 11.0378 2.91987 10.6271L7.89266 3.16795C8.17086 2.75065 8.63921 2.5 9.14073 2.5Z"></path><rect stroke-width="3" stroke="#000000" rx="2" height="4" width="11" y="18.5" x="15.5"></rect><path stroke-width="5" stroke="#000000" d="M1 12L41 12"></path></svg><div class="text">archive</div></div>
            </button>
        </form>
        <form action="{{route('trashBin')}}" method="GET" class="trash-form">
            <button type="submit" class="button-trash">
                <span class="button__text">trashbin</span>
                <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="520" viewBox="0 0 512 512" height="512" class="svg"><title></title><path style="fill:none;stroke:#323232;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px" d="M112,112l20,320c.95,18.49,14.4,32,32,32H348c17.67,0,30.87-13.51,32-32l20-320"></path><line y2="112" y1="112" x2="432" x1="80" style="stroke:#323232;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px"></line><path style="fill:none;stroke:#323232;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px" d="M192,112V72h0a23.93,23.93,0,0,1,24-24h80a23.93,23.93,0,0,1,24,24h0v40"></path><line y2="400" y1="176" x2="256" x1="256" style="fill:none;stroke:#323232;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line><line y2="400" y1="176" x2="192" x1="184" style="fill:none;stroke:#323232;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line><line y2="400" y1="176" x2="320" x1="328" style="fill:none;stroke:#323232;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line></svg>
                </span>
            </button>
        </form>
    </div>

    <h1><b>Create Note</b></h1>
        <div class="note-card">
            <form action="{{route('saveNote')}}" method="POST">
                @method('POST')
                @csrf
                <div>
                    <label for="title"></label>
                    <input placeholder="Title" class="input-t" id="title" name="title" type="text" /><br>
                </div><br>
                <div class="form-group">
                    <label for="description"></label>
                    <input placeholder="Description" class="input-dc" id="description" name="description" type="text"><br>
                </div>
                <div class="form-group">
                    <label for="content"></label>
                    <input placeholder="Content" class="input-dc" id="content" name="content" type="text"><br>
                </div>
            <br>
            <button type="submit" class="button-save"><span class="shadow"></span><span class="edge"></span><div class="front"><span>save</span></div></button>
            </form>
        </div>
        <br>
        <form action="{{route('showAllNotes')}}" method="GET" style="display:inline;">
            <button id=button-back class="button-back">
                  <span class="circle" aria-hidden="true"><span class="icon arrow"></span></span>
                  <span class="button-text">back</span>
            </button>
        </form>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const content = document.getElementById('content');
        const errorMessage = document.getElementById('error-message');
        const createButton = document.querySelector('.form-submit-btn');
        const maxCharacters = 10000;

        content.addEventListener('input', function () {
            if (content.value.length > maxCharacters) {
                errorMessage.style.display = 'block';
                createButton.disabled = true;
            } else {
                errorMessage.style.display = 'none';
                createButton.disabled = false; 
            }
        });
    });
</script>

</body>

<footer>
    <p>© {{ date('Y') }} Litera - A Note Application | BSIS 2 1st Semester Mid-Project | All Rights Reserved</p>
    <p>Developed by Yunis and Lyncie</p>
</footer>
</html>