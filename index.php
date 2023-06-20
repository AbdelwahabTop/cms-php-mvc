<?php

require "database/Connection.php";
require "./database/migrations/CreateUsersTable.php";

$pdo = Connection::make();
CreateUsersTable::usersTable($pdo);
CreatePostsTable::postsTable($pdo);

$queryPosts = "";
