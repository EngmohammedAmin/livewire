<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthenticateWithToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->post('/user', function (Request $request) {
    $user= $request->user();
    return response()->json($user);
});
Route::middleware('auth:sanctum')->post('/update-user', [UserController::class, 'update']);
Route::middleware('auth:sanctum')->get('/flutter', [ApiController::class, 'getData']);
// Route::get('/posts', [PostController::class, 'index']);
Route::middleware('auth:sanctum')->get('/posts', [PostController::class, 'index']);
Route::middleware('auth:sanctum')->post('/create-posts', [PostController::class, 'store'])->name('create-posts');
Route::middleware('auth:sanctum')->post('/update-posts/{id}', [PostController::class, 'update'])->name('update-posts');
Route::middleware('auth:sanctum')->post('/delete-posts/{id}', [PostController::class, 'delete'])->name('delete-posts');
Route::middleware('auth:sanctum')->post('/show-posts/{id}', [PostController::class, 'show'])->name('show-posts');

Route::middleware('auth:sanctum')->get('/tasks', [TaskController::class, 'index']);
Route::middleware('auth:sanctum')->post('/create-tasks', [TaskController::class, 'create'])->name('create-tasks');
Route::middleware('auth:sanctum')->post('/update-tasks/{id}', [TaskController::class, 'update'])->name('update-tasks');
Route::middleware('auth:sanctum')->post('/delete-tasks/{id}', [TaskController::class, 'delete'])->name('delete-tasks');
Route::middleware('auth:sanctum')->post('/show-tasks/{id}', [TaskController::class, 'show'])->name('show-tasks');

Route::post('/login', [ApiController::class, 'login']);
// Route::post('/logout', [ApiController::class, 'logout']);
// Route::middleware(AuthenticateWithToken::class)->group(function () {
//     Route::post('/logout', [ApiController::class, 'logout']);
// });
Route::middleware('auth:sanctum')->post('/logout', [ApiController::class, 'logout']);
Route::middleware('auth:sanctum')->post('/test', [ApiController::class, 'index']);

// Route::middleware('flutter.api')->group(function () {
//     // Routes accessible only by Flutter app
//     Route::post('/logout', [ApiController::class, 'logout']);
// });