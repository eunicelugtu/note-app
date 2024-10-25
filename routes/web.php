<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/notes', [NoteController::class, 'showAllNotes'])->name('showAllNotes');

Route::get('/notes/search', [NoteController::class, 'searchNote'])->name('searchNote');
Route::get('/notes/trashbin', [NoteController::class, 'trashBin'])->name('trashBin');
Route::get('/notes/favorite', [NoteController::class, 'showAllFavorites'])->name('showAllFavorites');
Route::get('/notes/archive', [NoteController::class, 'showArchive'])->name('showArchive');

Route::get('/notes/create', [NoteController::class, 'createNote'])->name('createNote');
Route::post('/notes/save', [NoteController::class, 'saveNote'])->name('saveNote');

Route::get('/notes/{id}', [NoteController::class, 'showNote'])->name('showNote');

Route::get('/notes/{id}/edit', [NoteController::class, 'editNote'])->name('editNote');
Route::put('/notes/{id}/update', [NoteController::class, 'updateNote'])->name('updateNote');

Route::patch('/notes/{id}/pin', [NoteController::class, 'pinnedNote'])->name('pinnedNote');
Route::patch('/notes/{id}/favorite', [NoteController::class, 'favoriteNote'])->name('favoriteNote');
Route::patch('/notes/{id}/toggle-archive', [NoteController::class, 'archiveNote'])->name('archiveNote');

Route::post('/notes/{id}/trash', [NoteController::class, 'deleteNote'])->name('deleteNote');
Route::post('/notes/{id}/restore', [NoteController::class, 'restoreNote'])->name('restoreNote');
Route::delete('/notes/{id}/delete', [NoteController::class, 'forceDeleteNote'])->name('forceDeleteNote');