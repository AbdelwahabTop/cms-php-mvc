<?php

$router->get('', 'DashbordController@index');
// $router->get('posts', 'DashbordController@allPosts');
$router->get('posts/create', 'DashbordController@create');
$router->post('posts/create', 'DashbordController@create');
$router->get('posts/view', 'DashbordController@show');
$router->get('posts/edit', 'DashbordController@edit');
$router->post('posts/delete', 'DashbordController@delete');

$router->get('posts', 'PostsController@index');
$router->post('posts/store', 'PostsController@store');
