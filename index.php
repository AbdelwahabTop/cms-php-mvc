<?php

$config = require "./config.php";
require "database/Connection.php";
require "./database/migrations/CreateUsersTable.php";
require "./database/migrations/CreatePostsTable.php";

$pdo = Connection::make($config['database']);
CreateUsersTable::usersTable($pdo);
CreatePostsTable::postsTable($pdo);
