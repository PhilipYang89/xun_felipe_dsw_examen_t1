<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\MessageController;
use App\Models\Message;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/messages', function () {
    $messages = \App\Models\Message::all();
    return view('messages', ['messages' => $messages]);
});
Route::get('/messages/create', function () {
    return view('create_messages');
});
Route::post('/messages', function (Request $request) {
    $validated = $request->validate([
    'text' => 'required|string|max:128',]);
    Message::create($validated);
    return redirect('/messages')->with('success','Mensaje añadido.'); 
});
// Defino la ruta para solicitar la eliminación de mensajes.
Route::get ('/messages/delete', function() {
    $messages = Message::all();
    return view('delete_messages', ['messages' => $messages]);
});
Route::post('/messages/delete', function (Request $request) {
    $request->validate([
   'message_ids' => 'required|array',]);
    Message::destroy($request->input('message_ids'));
    return redirect('/messages')->with('success', 'Mensaje(s) eliminados.');
});

Route::get ('/admin', function() {
    return view('admin');
});
// Esta ruta no me funcionaba al final
Route::get ('/admin/messages', function() {
    return view('admin.messages');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
