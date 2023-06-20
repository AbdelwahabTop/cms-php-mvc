<?php

$config = require "./config.php";

$pdo = Connection::make($config['database']);
CreateUsersTable::usersTable($pdo);
CreatePostsTable::postsTable($pdo);

$router->define([
    '' => "controllers/index.php"
]);
