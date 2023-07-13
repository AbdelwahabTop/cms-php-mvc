<?php

namespace App\Controllers;

use App\Models\Categories;
use App\Request;
use App\Models\Post;

class PostsController
{
    public function index()
    {
        $posts = (new Post)->allPost('posts');
        return view("posts", ['posts' => $posts]);
    }

    public static function store()
    {
        $img = Request::file()['thumbnail'];
        $filepath = $img['tmp_name'];

        $imgName = strtolower(str_replace(' ', '-', $img['name']));

        $imgUrl = 'public/assets/thumbnails/' . $imgName;

        move_uploaded_file($filepath, $imgUrl);

        $data = Request::values();
        $categoryIds = $data['categories'];
        unset($data['categories']);

        dd($data);
        dd($categoryIds);

        (new Post)->storePost($imgUrl, $data, $categoryIds);

        // startSession();
        // setSession('success', 'Post added succesfully');

        redirect('/posts/create');
    }

    public function show()
    {
        $post = (new Post)->showPost("posts", Request::values()['id']);
        $selectedCategories = (new Categories)->nameSelectedCategories(Request::values()['id']);

        return view("show", [
            'post' => $post,
            'selectedCategories' => $selectedCategories
        ]);
    }

    public function destroy()
    {
        $post = (new Post)->deletePost("posts", Request::values()['id']);

        // startSession();
        // setSession('success', 'Post deleted succesfully');

        redirect('/posts');
    }

    public function edit()
    {
        $oldData = (new Post)->showPost("posts", Request::values()['id']);
        $categories = (new Categories)->showAll("categories", Request::values()['id']);
        $selectedCategories = (new Categories)->selectedCategories(Request::values()['id']);
        // dd($categories);
        return view(
            "edit",
            [
                'oldData' => $oldData,
                'categories' => $categories,
                'selectedCategories' => $selectedCategories
            ]
        );
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

        // dd(Request::values());

        (new Post)->updatePost('posts', Request::values()['id'], $imgUrl, Request::values());

        // startSession();
        // setSession('success', 'Post deleted succesfully');

        redirect('/posts');
    }
}
