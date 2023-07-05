<?php

namespace App\Controllers;

use App\Request;

class PostsController
{
    public static function store()
    {
        dd(Request::values());
    }
}
