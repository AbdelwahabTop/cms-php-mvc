<?php

// $router->get('', 'controllers/index.php');
// $router->get('posts', 'controllers/posts.php');

$router->get('cms-crud', 'DashbordController@index');
$router->get('cms-crud/posts', 'DashbordController@allPosts');
$router->get('cms-crud/posts/create', 'DashbordController@create');
$router->get('cms-crud/posts/view', 'DashbordController@show');
$router->get('cms-crud/posts/edit', 'DashbordController@edit');
$router->post('cms-crud/posts/delete', 'DashbordController@delete');
