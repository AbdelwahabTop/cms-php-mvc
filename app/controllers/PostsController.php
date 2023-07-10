<?php

namespace App\Controllers;

use App\Request;
use App\Models\Post;

class PostsController
{
    public function index()
    {
        $posts = (new Post)->allPost('posts');
        // echo $_SERVER['REQUEST_URI'];
        return view("posts", ['posts' => $posts]);
    }

    public static function store()
    {
        $img = Request::file()['thumbnail'];
        $filepath = $img['tmp_name'];

        $imgName = strtolower(str_replace(' ', '-', $img['name']));

        $imgUrl = 'public/assets/thumbnails/' . $imgName;

        move_uploaded_file($filepath, $imgUrl);

        (new Post)->storePost($imgUrl, Request::values());

        startSession();
        setSession('success', 'Post added succesfully');

        redirect('/posts/create');
    }

    public function show()
    {
        $post = (new Post)->showPost("posts", Request::values()['id']);

        return view("show", ['post' => $post]);
    }

    public function destroy()
    {
        $post = (new Post)->deletePost("posts", Request::values()['id']);

        startSession();
        setSession('success', 'Post deleted succesfully');

        redirect('/posts');
    }

    public function edit()
    {
        $oldData = (new Post)->showPost("posts", Request::values()['id']);
        // dd($oldData);
        return view("edit", ['oldData' => $oldData]);
    }

    public function update()
    {
        $img = Request::file()['thumbnail'];
        $filepath = $img['tmp_name'];
        if (!$filepath) {
            $imgUrl = Request::values()['oldThumnail'];
            dd($imgUrl);
        } else {
            $imgName = strtolower(str_replace(' ', '-', $img['name']));

            $imgUrl = 'public/assets/thumbnails/' . $imgName;

            move_uploaded_file($filepath, $imgUrl);
        }


        // dd($imgName);
        // dd($imgUrl);

        (new Post)->updatePost('posts', Request::values()['id'], $imgUrl, Request::values());

        startSession();
        setSession('success', 'Post deleted succesfully');

        redirect('/posts');
    }
}
