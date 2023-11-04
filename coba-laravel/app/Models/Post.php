<?php

namespace App\Models;

class Post 
{
    private static $blog_posts =  [
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
    ]
];

public static function all()
{
    return collect(self::$blog_posts);
}

public static function find($slug)
{
    $posts = static::all();
    return $posts->firstWhere('slug', $slug);

}

}
