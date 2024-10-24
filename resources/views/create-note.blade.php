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
    <h1>Create Note</h1>

    <form action="{{route('saveNote')}}" method="POST" enctype="multipart/form-data">
        @method('POST')
        @csrf
        <label for="title">Title</label>
        <input type="text" id="title" name="title"><br>
        <label for="description">Description</label>
        <input type="text" id="description" name="description"><br>
        <label for="content">Content</label>
        <input type="text" id="content" name="content"><br>
        <div class="form-group">
            <label for="image">Upload Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <br>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>

    <form action="{{route('showAllNotes')}}" method="GET">
        <button type="submit">Back to Notes</button>
    </form>
    
</body>
</html>