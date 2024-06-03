<?php

use App\Http\Controllers\GmailController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\TaskController;
use App\Livewire\AppTasks;
use App\Livewire\CreatePost;
use App\Livewire\Posts;
use App\Livewire\Test;
use App\Livewire\UpdatePost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    // return 'oooooo';
})->name('welcome');
Route::get('/posts/index', function () {
    return view('Postss.index');
})->name('posts.index');
// Route::get('/posts/index', Posts::class,'getpost')->name('posts.index');
Route::get('/posts/create', [CreatePost::class, 'create'])->name('posts.create');
// Route::get('/posts/edit/{idd}', [UpdatePost::class, 'edit'])->name('posts.edit');
Route::get('posts/{postId}/edit', UpdatePost::class)->name('posts.edit');
Route::get('posts/{postId}/delete', UpdatePost::class)->name('posts.delete');

Route::get('/tasks/index', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks', AppTasks::class)->name('tasks');
Route::get('/test', Test::class)->name('test');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::resource('photos', PhotoController::class)->only([
//     'index', 'show'
// ]);
Route::resource('photos', PhotoController::class)->names(['index' => 'GGGGG']);

Route::get('/gmail-messages', [GmailController::class, 'getMessages']);
