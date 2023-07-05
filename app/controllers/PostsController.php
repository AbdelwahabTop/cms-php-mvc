<?php

namespace App\Controllers;

use App\Request;
use App\Models\Post;

class PostsController
{
    public static function store()
    {
        $img = Request::file()['thumbnail'];
        $filepath = $img['tmp_name'];

        $imgName = strtolower(str_replace(' ', '-', $img['name']));

        $imgUrl = 'public/assets/thumbnails/' . $imgName;

        move_uploaded_file($filepath, $imgUrl);

        (new Post)->storePost($imgUrl, Request::values());
    }
}
