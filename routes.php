<?php

// $router->define([
//     '' => "controllers/index.php",
//     "posts" => "controllers/posts.php"
// ]);

$router->get('', 'controllers/index.php');
$router->get('posts', 'controllers/posts.php');
// $router->get('/post', 'controllers/index.php');