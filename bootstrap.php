<?php

use App\Router;
use App\Request;

CreateUsersTable::usersTable(connect());
CreatePostsTable::postsTable(connect());

Router::load('routes.php')
    ->show(Request::uri(), Request::method());
