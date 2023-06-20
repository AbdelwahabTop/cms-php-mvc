<?php

App::bind('config', require "config.php");

$pdo = Connection::make(App::get('config')['database']);

CreateUsersTable::usersTable($pdo);
CreatePostsTable::postsTable($pdo);

require Router::load('routes.php')
    ->show(Request::uri());
