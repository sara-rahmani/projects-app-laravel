<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;



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


Route::get('/api/projects', [ProjectController::class, 'getProjectsJSON']);
Route::get('/api/categories', [CategoryController::class, 'getCategoriesJSON']);
Route::get('/api/tags', [TagController::class, 'getTagsJSON']);

Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{project:slug}', [ProjectController::class, 'show']);
// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', [ProjectController::class, 'summaries']);

Route::get('/about', function () {
    return view('about');
});
// Route::get('/categories/{category}', [ProjectController::class, 'listByCategory']);

Route::get('/categories/{category:slug}', [ProjectController::class, 'listByCategory']);

Route::get('/login', [SessionController::class, 'create'])->name('login')->middleware('guest');

Route::post('/login', [SessionController::class, 'store'])->middleware('guest');

Route::get('/logout', [SessionController::class, 'destroy'])->middleware('auth');
Route::fallback(function () {

    // Set a flash message
    session()->flash('error', 'Requested page not found.  Home you go.');

    // Redirect to /
    return redirect('/');
});



// Route::get('/admin/projects', [ProjectController::class, 'index'])->middleware('admin');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);

    /////////////// Projects ////////////
    Route::get('/admin/projects/create', [ProjectController::class, 'create']);
    Route::post('/admin/projects/create', [ProjectController::class, 'store']);

    Route::get('/admin/projects/{project}/edit', [ProjectController::class, 'edit']);
    Route::patch('/admin/projects/{project}/edit', [ProjectController::class, 'update']);

    Route::delete('/admin/projects/{project}/delete', [ProjectController::class, 'destroy']);

    /////////////// Users ////////////

    Route::get('/admin/users/create', [UserController::class, 'create']);
    Route::post('/admin/users/create', [UserController::class, 'store']);

    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit']);
    Route::patch('/admin/users/{user}/edit', [UserController::class, 'update']);

    Route::delete('/admin/users/{user}/delete', [UserController::class, 'destroy']);

    /////////////// Categories ////////////

    Route::get('/admin/categories/create', [CategoryController::class, 'create']);
    Route::post('/admin/categories/create', [CategoryController::class, 'store']);

    Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'edit']);
    Route::patch('/admin/categories/{category}/edit', [CategoryController::class, 'update']);

    Route::delete('/admin/categories/{category}/delete', [CategoryController::class, 'destroy']);
/////////////////Tags/////////////////////
Route::get('/admin/tags/create', [TagController::class, 'create']);
Route::post('/admin/tags/create', [TagController::class, 'store']);

Route::get('/admin/tags/{tag}/edit', [TagController::class, 'edit']);
Route::patch('/admin/tags/{tag}/edit', [TagController::class, 'update']);

Route::delete('/admin/tags/{tag}/delete', [TagController::class, 'destroy']);
/////////////register//////////////////
    Route::get('/register', [RegisterUserController::class, 'create']);
    Route::post('/register', [RegisterUserController::class, 'store']);

    Route::get('/admin/{project:slug}', [AdminController::class, 'show']);



});