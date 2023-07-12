<?php
$router->get('', 'DashbordController@index');
// $router->get('posts', 'DashbordController@allPosts');
// $router->get('posts/create', 'DashbordController@create');
// $router->post('posts/create', 'DashbordController@create');
// $router->get('posts/view', 'DashbordController@show');
// $router->get('posts/edit', 'DashbordController@edit');
// $router->post('posts/delete', 'DashbordController@delete');
$router->get('posts/create', 'CategoriesController@create');


$router->get('posts', 'PostsController@index');
$router->post('posts/store', 'PostsController@store');
$router->get('posts/view', 'PostsController@show');
$router->get('posts/edit', 'PostsController@edit');
$router->post('posts/delete', 'PostsController@destroy');
$router->post('posts/update', 'PostsController@update');

$router->get('login', 'LoginController@index');
$router->post('login', 'LoginController@index');
