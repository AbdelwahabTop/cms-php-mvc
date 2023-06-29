<?php


class DashbordController
{
    public function index()
    {
        return view("index");
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
