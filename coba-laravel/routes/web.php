<?php

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


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
    return view('home' , [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about' , [
        "title" => "About",
        "name" => "Deandra Adhitya",
        "email" => "deandraaditya45@gmail.com",
        "image" => "icon.png"
    ]);
});

Route::get('/blog', [PostController::class, 'index']);




//Halaman Single post
Route::get('posts/{post:slug}', [PostController::class, 'show']);