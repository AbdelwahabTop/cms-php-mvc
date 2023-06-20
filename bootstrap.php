<?php

$config = require "./config.php";

$pdo = Connection::make($config['database']);
CreateUsersTable::usersTable($pdo);
CreatePostsTable::postsTable($pdo);

require Router::load('routes.php')
    ->show(Request::uri());
