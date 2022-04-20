<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Todo;


Route::get('/', function () {
    return view('signin$signup');
});

Route::post('/register-or-login', [UserController::class, 'user_register_or_login'])->name('auth');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

/* Todo functionalities. */


Route::get('/todos', function() {

    $todos = Todo::where('userid', '=', \Session::get('user')[0])->get();

    return view('home', compact('todos'));
});

Route::get('/add-todo', function() {
    return view('create');
});

Route::post('/create-todo', function() {
    $input = $_POST['todo'];
    $todo = new Todo;
    $todo->todotitle = $input;
    $todo->tododeadline = $_POST['deadline'];
    $todo->userid = \Session::get('user')[0];
    $todo->save();
    return redirect('/todos');
});

Route::get('/delete-todo/{id}', function($id) {
    $res = Todo::where('id', '=', $id)->delete();
    if($res) {
        return redirect('/todos');
    }
});
Route::get('/done-status/{id}', function($id) {
    $todo = Todo::where('id', '=', $id)->first();
    $todo->todostatus = 1;
    $response = $todo->save();
    if($response) return redirect('/todos');
});
Route::get('/undone-status/{id}', function($id) {
    $todo = Todo::where('id', '=', $id)->first();
    $todo->todostatus = 0;
    $response = $todo->save();
    if($response) return redirect('/todos');
});
Route::get('/edit-todo/{id}', function($id) {
    $todo = Todo::where('id', '=', $id)->first();
    return view('edit', ['content' => $todo['todotitle'], 'id' => $id]);
});
Route::post('/update-todo/{id}', function($id) {
    $input = $_POST['todo'];
    $todo = Todo::where('id', '=', $id)->first();
    $todo->todotitle = $input;
    $todo->save();
    return redirect('/todos');
});