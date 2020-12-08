<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Route::get('/', function () {
    return view('welcome');
})->name('accueil');

Auth::routes();

Route::get('/admin', function() {
    return view('admin');
})->name('admin')->middleware('administrationAcces');


Route::get('posts', [PostController::class, 'postsMembers'])->name('posts.members');
Route::resource('admin/posts', PostController::class)->middleware(['isConnected','administrationAcces']);
Route::resource('admin/users', UserController::class)->middleware(['isConnected','admin']);