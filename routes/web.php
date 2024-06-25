<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Models\Notes;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/note', [NoteController::class, 'index'])->name('note.index');
Route::get('/note/create', [NoteController::class, 'create'])->name('note.create');
Route::post('/note', [NoteController::class, 'store'])->name('note.store');
Route::get('/note/{note}', [NoteController::class, 'show'])->name('note.show');
Route::get('/note/{note}/edit', [NoteController::class, 'edit'])->name('note.edit');
Route::put('/note/{note}', [NoteController::class, 'update'])->name('note.update');
Route::delete('/note/{notes}', [NoteController::class, 'destroy'])->name('note.destroy');
// instead of using all those lines we can simplify them in one line like bellow 

// Route::resource('note', NoteController::class);


