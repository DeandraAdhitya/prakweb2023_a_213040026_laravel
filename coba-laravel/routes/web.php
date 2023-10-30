<?php

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

Route::get('/blog', function () {
    $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Deandra Adhitya",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut repellendus quae doloribus dignissimos tempora saepe debitis fuga commodi veniam sunt quia tenetur cumque, soluta labore assumenda ducimus, deleniti quos quisquam, velit ea suscipit? Deserunt officiis eaque inventore sapiente dolores voluptates ipsam recusandae accusantium in quas dolor omnis ipsa dolorem eius mollitia a temporibus qui placeat, distinctio voluptate quae eum? Autem animi, dolores sapiente ipsa illum sequi doloremque voluptate eaque obcaecati non? Ipsum odit ab veniam velit neque error sed delectus?"
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Yuji",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut repellendus quae doloribus dignissimos tempora saepe debitis fuga commodi veniam sunt quia tenetur cumque, soluta labore assumenda ducimus, deleniti quos quisquam, velit ea suscipit? Deserunt officiis eaque inventore sapiente dolores voluptates ipsam recusandae accusantium in quas dolor omnis ipsa dolorem eius mollitia a temporibus qui placeat, distinctio voluptate quae eum? Autem animi, dolores sapiente ipsa illum sequi doloremque voluptate eaque obcaecati non? Ipsum odit ab veniam velit neque error sed delectus?"
        ],
    ];

    return view('posts' , [
        "title" => "Posts",
        "posts"=> $blog_posts
    ]);
});


//Halaman Single post
Route::get('posts/{slug}', function($slug) {
    $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Deandra Adhitya",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut repellendus quae doloribus dignissimos tempora saepe debitis fuga commodi veniam sunt quia tenetur cumque, soluta labore assumenda ducimus, deleniti quos quisquam, velit ea suscipit? Deserunt officiis eaque inventore sapiente dolores voluptates ipsam recusandae accusantium in quas dolor omnis ipsa dolorem eius mollitia a temporibus qui placeat, distinctio voluptate quae eum? Autem animi, dolores sapiente ipsa illum sequi doloremque voluptate eaque obcaecati non? Ipsum odit ab veniam velit neque error sed delectus?"
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Yuji",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut repellendus quae doloribus dignissimos tempora saepe debitis fuga commodi veniam sunt quia tenetur cumque, soluta labore assumenda ducimus, deleniti quos quisquam, velit ea suscipit? Deserunt officiis eaque inventore sapiente dolores voluptates ipsam recusandae accusantium in quas dolor omnis ipsa dolorem eius mollitia a temporibus qui placeat, distinctio voluptate quae eum? Autem animi, dolores sapiente ipsa illum sequi doloremque voluptate eaque obcaecati non? Ipsum odit ab veniam velit neque error sed delectus?"
        ],
    ];
    
    $new_post = [];
    foreach($blog_posts as $post) {
        if($post["slug"] === $slug) {
            $new_post = $post;
        }
    }

    return view('post', [
        "title" => "Single Post",
        "post" => $new_post
    ]);
});