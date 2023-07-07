<?php

namespace App\Controllers;

use Dashbord;

class DashbordController
{
    public function index()
    {
        $numOfPosts = (new Dashbord)->numOfPosts('posts');

        return view("index", ['numOfPosts' => count($numOfPosts)]);
    }

    public function allPosts()
    {
        return view("posts");
    }

    public function create()
    {
        return view("create");
    }

    public function show()
    {
        return view("show");
    }

    public function edit()
    {
        return view("edit");
    }

    public function delete()
    {
        echo "delete";
    }
}
