<?php

use App\App;
use App\Router;
use App\Request;

App::bind('config', require "config.php");

$pdo = Connection::make(App::get('config')['database']);

CreateUsersTable::usersTable($pdo);
CreatePostsTable::postsTable($pdo);

Router::load('routes.php')
    ->show(Request::uri(), Request::method());

 function view($view, $data=null)
{
    require "views/{$view}.view.php";
}
